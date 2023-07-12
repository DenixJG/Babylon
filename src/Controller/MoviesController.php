<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 * @method \App\Model\Entity\Movie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoviesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->menu          = 'movies';
        $this->submenu       = 'movies';
        $this->section_title = 'Movies';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $paginate_settings = [
            'contain' => ['MovieStatuses'],
            'conditions' => ['Movies.is_deleted' => false],
        ];

        $movies = $this->paginate($this->Movies, $paginate_settings);

        $this->set(compact('movies'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => ['MovieStatuses', 'MovieDirectors'],
        ]);

        $this->set(compact('movie'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function new()
    {
        $movie = $this->Movies->newEmptyEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $movieStatuses = $this->Movies->MovieStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('movie', 'movieStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movie = $this->Movies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $movieStatuses = $this->Movies->MovieStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('movie', 'movieStatuses'));
    }

    /**
     * Delete a movie from database
     * 
     * This method really not delete a movie from database, it just change the is_deleted field to true
     *          
     * @return \Cake\Http\Response|null|void Redirects to index.     
     */
    public function delete()
    {
        try {
            // Allow only DELETE method
            if (!$this->request->is(['DELETE', 'AJAX'])) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Movies', 'Method not allowed, only DELETE method is allowed'),
                ]);
            }

            // Get data from request
            $action = $this->request->getData('action');
            $data   = $this->request->getData();
            \Cake\Log\Log::error(print_r($data, true));

            $movie_id = $data['data']['movieId'] ?? null;
            if (empty($movie_id)) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Movies', 'Movie ID is required'),
                ]);
            }

            // Get movie from database
            $movie = $this->Movies->getById((int) $movie_id);
            if (empty($movie)) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Movies', 'Movie not found'),
                ]);
            }

            // Mark movie as deleted and save it
            $movie->is_deleted = true;
            if (!$this->Movies->save($movie)) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Movies', 'Movie could not be deleted'),                    
                ]);
            }

            // Return success message
            return $this->json([
                'success' => true,
                'message' => __d('Movies', 'Movie deleted successfully'),
                'redirect' => '/movies',
            ]);

        } catch (\Exception $e) {
            \Cake\Log\Log::error(print_r($e->getMessage(), true));
            \Cake\Log\Log::error(print_r($e->getTraceAsString(), true));
            return $this->json([
                'success' => false,
                'message' => __d('Movies', 'Movie could not be deleted, please try again later'),
            ]);
        }
    }
}