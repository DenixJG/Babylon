<?php
declare(strict_types=1);

namespace App\Controller;
use App\Utils\Apis\TmdbClient;


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
            $tmdb = $client_search->searchMulti($search_term);

            \Cake\Log\Log::error(print_r($tmdb, true));

            // Set the search term and results to the view
            $this->set(compact('search_term', 'tmdb'));
        }
    }
}