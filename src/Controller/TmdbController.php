<?php
declare(strict_types=1);

namespace App\Controller;

use App\Utils\Apis\TmdbClient;
use Cake\Datasource\FactoryLocator;
use Cake\View\JsonView;

/**
 * Tmdb Controller
 *
 * @method \App\Model\Entity\Tmdb[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TmdbController extends AppController
{

    /** @var \App\Model\Table\MoviesTable */
    private $Movies;

    /** @var \App\Model\Table\GenresTable */
    private $Genres;

    /** @var \App\Model\Table\ShowsTable */
    private $Shows;

    public function initialize(): void
    {
        parent::initialize();

        $this->Movies = $this->fetchTable('Movies');
        $this->Shows  = $this->fetchTable('Shows');
        $this->Genres = $this->fetchTable('Genres');

        $this->menu          = 'external_sources';
        $this->submenu       = 'tmdb';
        $this->section_title = 'The Movie Database';
    }

    /**
     * View method
     *
     * @param string|null $search_term Tmdb id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function search($search_term = null)
    {
        // Check if the search term is empty and get the search from query string
        if (empty($search_term)) {
            $search_term = $this->request->getQuery('q');
        }

        if (!empty($search_term)) {
            // Get the search results from the TMDb API
            $client_search = TmdbClient::getInstance()->getClientSearchApi();
            $tmdb_result   = $client_search->searchMulti($search_term);

            if (!empty($tmdb_result)) {
                // Get the image helper
                $image_helper = TmdbClient::getInstance()->getImageHelper();

                // Loop through the results and get the images
                foreach ($tmdb_result['results'] as $key => $result) {
                    if (isset($result['backdrop_path'])) {
                        $tmdb_result['results'][$key]['backdrop_url'] = 'https:' . $image_helper->getUrl($result['backdrop_path'], 'w300');
                    }

                    if (isset($result['poster_path'])) {
                        $tmdb_result['results'][$key]['poster_url'] = 'https:' . $image_helper->getUrl($result['poster_path'], 'w300');
                    }

                    if (isset($result['profile_path'])) {
                        $tmdb_result['results'][$key]['profile_url'] = 'https:' . $image_helper->getUrl($result['profile_path'], 'w300');
                    }
                }
            }

            // Convert array $tmdb_result to object
            $tmdb_result['results'] = json_decode(json_encode($tmdb_result['results']));

            // Set the search term and results to the view
            $this->set(compact('search_term', 'tmdb_result'));
        }
    }

    /**
     * Add to library any resource from TMDb API
     *
     * @return \Cake\Http\Response|null|void Return a response with JSON data
     */
    public function addToLibrary()
    {
        // Only allow POST requests from AJAX calls
        if (!$this->request->is(['POST', 'AJAX'])) {
            return $this->json([
                'success' => false,
                'message' => 'Only POST requests are allowed'
            ]);
        }

        // Get the data from the request
        $action = $this->request->getData('action');
        $data   = $this->request->getData();
        \Cake\Log\Log::error(print_r($data, true));

        $tmdb_id    = $data['data']['tmdbId'] ?? null;
        $media_type = $data['data']['mediaType'] ?? null;
        if (empty($tmdb_id) || empty($media_type)) {
            return $this->json([
                'success' => false,
                'message' => 'No data received'
            ]);
        }

        // Based on the media type, get the correct table and entity
        $Table = $this->getTableByMedia($media_type);

        // Check if the table have the getByTmdbId method
        if (!method_exists($Table, 'getByTmdbId')) {
            \Cake\Log\Log::error(print_r('The table ' . $Table->getAlias() . ' does not have the getByTmdbId method', true));
            return $this->json([
                'success' => false,
                'message' => 'Something went wrong, contact the administrator for more information'
            ]);
        }

        // Get the entity by the TMDb id
        $entity = $Table->getByTmdbId((int) $tmdb_id);

        // Check if the entity exists
        if (!empty($entity)) {
            return $this->json([
                'success' => false,
                'message' => __d('tmdb', 'The {0} already exists in the library', $media_type)
            ]);
        }

        // Get the data from the TMDb API and save it to the database
        $client      = TmdbClient::getInstance()->getClient();
        $remote_data = $this->getRemoteData($client, $media_type, $tmdb_id);

        // Check if method parseDataToEntity exists in the table
        if (!method_exists($Table, 'parseDataToEntity')) {
            \Cake\Log\Log::error(print_r('The table ' . $Table->getAlias() . ' does not have the parseDataToEntity method', true));
            return $this->json([
                'success' => false,
                'message' => 'Something went wrong, contact the administrator for more information'
            ]);
        }

        // Parse the data to the correct entity and save it to the database
        $entity = $Table->parseDataToEntity($remote_data);
        $save_options = $this->getSaveOptionsByMedia($media_type);

        \Cake\Log\Log::error(print_r($entity, true));

        // Save the entity to the database
        if (!$Table->save($entity, $save_options)) {
            \Cake\Log\Log::error(print_r($entity->getErrors(), true));
            return $this->json([
                'success' => false,
                'message' => __d('tmdb', 'Something went wrong while saving the {0}', $media_type)
            ]);
        }

        return $this->json([
            'success' => true,
            'message' => __d('tmdb', 'The {0} has been saved to the library', $media_type)
        ]);
    }

    /**
     * Get remote data from TMDb API based on the media type and TMDb id
     *
     * @param \Tmdb\Client $client
     * @param string $media_type
     * @param mixed $tmdb_id
     * @return mixed|null
     */
    private function getRemoteData($client, $media_type, $tmdb_id)
    {
        switch ($media_type) {
            case 'movie':
                $remote_data = $client->getMoviesApi()->getMovie($tmdb_id);
                break;
            case 'tv':
                $remote_data = $client->getTvApi()->getTvshow($tmdb_id);
                break;
            case 'person':
                $remote_data = $client->getPeopleApi()->getPerson($tmdb_id);
                break;
            default:
                $remote_data = null;
                break;
        }

        return $remote_data;
    }

    /**
     * Get the save options based on the media type
     * 
     * The save options are used to save the entity to the database 
     * with the correct associations and data validation rules
     *
     * @param string $media_type The media type
     * @return array
     */
    private function getSaveOptionsByMedia(string $media_type)
    {
        switch ($media_type) {
            case 'movie':
            case 'movies':
                $save_options = array();
                break;
            case 'tv':
            case 'show':
            case 'shows':
                $save_options['associated'] = [
                    'Seasons'
                ];
                break;
            case 'person':
                $save_options = array();
                break;
            default:
                $save_options = array();
                break;
        }

        return $save_options;
    }
}