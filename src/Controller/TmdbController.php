<?php
declare(strict_types=1);

namespace App\Controller;

use App\Utils\Apis\TmdbClient;
use Tmdb\Model\Collection\ResultCollection;


/**
 * Tmdb Controller
 *
 * @method \App\Model\Entity\Tmdb[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TmdbController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->menu = 'external_sources';
        $this->submenu = 'tmdb';
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
            $tmdb_result = $client_search->searchMulti($search_term);

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
}