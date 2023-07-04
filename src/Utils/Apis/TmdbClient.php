<?php
declare(strict_types=1);

namespace App\Utils\Apis;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Tmdb\Client;
use Tmdb\Event\BeforeHydrationEvent;
use Tmdb\Event\BeforeRequestEvent;
use Tmdb\Event\HttpClientExceptionEvent;
use Tmdb\Event\Listener\Logger\LogApiErrorListener;
use Tmdb\Event\Listener\Logger\LogHttpMessageListener;
use Tmdb\Event\Listener\Logger\LogHydrationListener;
use Tmdb\Event\Listener\Psr6CachedRequestListener;
use Tmdb\Event\Listener\Request\AcceptJsonRequestListener;
use Tmdb\Event\Listener\Request\AdultFilterRequestListener;
use Tmdb\Event\Listener\Request\ApiTokenRequestListener;
use Tmdb\Event\Listener\Request\ContentTypeJsonRequestListener;
use Tmdb\Event\Listener\Request\LanguageFilterRequestListener;
use Tmdb\Event\Listener\Request\RegionFilterRequestListener;
use Tmdb\Event\Listener\Request\UserAgentRequestListener;
use Tmdb\Event\RequestEvent;
use Tmdb\Event\ResponseEvent;
use Tmdb\Event\TmdbExceptionEvent;
use Tmdb\Formatter\Hydration\SimpleHydrationFormatter;
use Tmdb\Formatter\TmdbApiException\SimpleTmdbApiExceptionFormatter;
use Tmdb\Helper\ImageHelper;
use Tmdb\Model\Search\SearchQuery\KeywordSearchQuery;
use Tmdb\Repository\ConfigurationRepository;
use Tmdb\Token\Api\ApiToken;
use Tmdb\Token\Api\BearerToken;

/**  
 * This class represents a client for the TMDB API. It provides methods for making requests to the API and handles
 * authentication, caching, logging, and event dispatching. The class uses the Guzzle HTTP client library and the
 * Symfony EventDispatcher component.
 * 
 * @package Utils\apis
 */
class TmdbClient
{
    /** @var TmdbClient*/
    private static ?TmdbClient $instance = null;

    /** @var Logger */
    public Logger $logger;

    /** @var Client */
    public Client $client;

    /** @var \Symfony\Component\EventDispatcher\EventDispatcher */
    private EventDispatcher $ed;

    /** @var BearerToken|ApiToken */
    private BearerToken|ApiToken $token;

    private function __construct()
    {
        $this->token = defined('TMDB_BEARER_TOKEN') && TMDB_BEARER_TOKEN !== 'TMDB_BEARER_TOKEN' ?
            new BearerToken(TMDB_BEARER_TOKEN) :
            new ApiToken(TMDB_API_KEY);

        $this->ed = new EventDispatcher();

        $this->logger = new Logger(
            'php-tmdb',
            [
                new StreamHandler(LOGS . '/php-tmdb.log', LogLevel::DEBUG)
            ]
        );

        $this->client = new Client(
            [
                /** @var ApiToken|BearerToken */
                'api_token' => $this->token,
                'secure' => true,
                'base_uri' => Client::TMDB_URI,
                // 'session_token' => null,
                'event_dispatcher' => [
                    'adapter' => $this->ed
                ],
                // We make use of PSR-17 and PSR-18 auto discovery to automatically guess these, but preferably set these explicitly.
                'http' => [
                    'client' => null,
                    'request_factory' => null,
                    'response_factory' => null,
                    'stream_factory' => null,
                    'uri_factory' => null,
                ],
                'hydration' => [
                    'event_listener_handles_hydration' => false,
                    'only_for_specified_models' => []
                ]
            ]
        );

        /**
         * Instantiate the PSR-6 cache
         */
        $cache = new FilesystemAdapter('php-tmdb', 86400, CACHE);

        /**
         * The full setup makes use of the Psr6CachedRequestListener.
         *
         * Required event listeners and events to be registered with the PSR-14 Event Dispatcher.
         */
        $requestListener = new Psr6CachedRequestListener(
            $this->client->getHttpClient(),
            $this->ed,
            $cache,
            $this->client->getHttpClient()->getPsr17StreamFactory(),
            []
        );

        $this->ed->addListener(RequestEvent::class, $requestListener);

        $apiTokenListener = new ApiTokenRequestListener($this->client->getToken());
        $this->ed->addListener(BeforeRequestEvent::class, $apiTokenListener);

        $acceptJsonListener = new AcceptJsonRequestListener();
        $this->ed->addListener(BeforeRequestEvent::class, $acceptJsonListener);

        $jsonContentTypeListener = new ContentTypeJsonRequestListener();
        $this->ed->addListener(BeforeRequestEvent::class, $jsonContentTypeListener);

        $this->setLoggerSetup();

        $this->addPlugins();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new TmdbClient();
        }

        return self::$instance;
    }

    /**
     * Return the TMDB client.
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Return the search API.
     *
     * @return \Tmdb\Api\Search
     */
    public function getClientSearchApi()
    {
        return $this->client->getSearchApi();
    }

    /**
     * Returns the configuration API.
     *
     * @return \Tmdb\Api\Configuration
     */
    public function getConfigurationApi()
    {
        return $this->client->getConfigurationApi();
    }

    /**
     * Return the ConfigurationRepository.
     *
     * @return \Tmdb\Model\Configuration
     */
    public function getConfigurationRepository()
    {
        $configurationRepository = new ConfigurationRepository($this->client);

        return $configurationRepository->load();
    }

    /**
     * Get the ImageHelper based on the configuration.
     *
     * @param \Tmdb\Model\Configuration $configuration
     * @return ImageHelper
     */
    public function getImageHelper($configuration = null)
    {
        if (!$configuration) {
            $configuration = $this->getConfigurationRepository();
        }

        return new ImageHelper($configuration);        
    }

    private function setLoggerSetup()
    {
        /**
         * Optional for logging, you can also omit events you do not wish to be logged.
         */
        $requestLoggerListener = new LogHttpMessageListener(
            $this->logger,
            new \Tmdb\Formatter\HttpMessage\FullHttpMessageFormatter()
        );
        $this->ed->addListener(BeforeRequestEvent::class, $requestLoggerListener);
        $this->ed->addListener(ResponseEvent::class, $requestLoggerListener);
        $this->ed->addListener(HttpClientExceptionEvent::class, $requestLoggerListener);

        $hydrationLoggerListener = new LogHydrationListener(
            $this->logger,
            new SimpleHydrationFormatter(),
            false // set to true if you wish to add the json data passed for each hydration, do not use this on production
        );
        $this->ed->addListener(BeforeHydrationEvent::class, $hydrationLoggerListener);

        $apiErrorListener = new LogApiErrorListener(
            $this->logger,
            new SimpleTmdbApiExceptionFormatter()
        );

        $this->ed->addListener(TmdbExceptionEvent::class, $apiErrorListener);
    }

    private function addPlugins()
    {
        $adultFilterListener = new AdultFilterRequestListener(true);
        $this->ed->addListener(BeforeRequestEvent::class, $adultFilterListener);

        $languageFilterListener = new LanguageFilterRequestListener(TMDB_LANGUAGE);
        $this->ed->addListener(BeforeRequestEvent::class, $languageFilterListener);

        $regionFilterListener = new RegionFilterRequestListener(TMDB_REGION);
        $this->ed->addListener(BeforeRequestEvent::class, $regionFilterListener);

        $userAgentListener = new UserAgentRequestListener();
        $this->ed->addListener(BeforeRequestEvent::class, $userAgentListener);
    }
}