<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Shows Controller
 *
 * @property \App\Model\Table\ShowsTable $Shows
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShowsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->menu          = 'shows';
        $this->submenu       = 'shows';
        $this->section_title = 'Shows';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $paginate_settings = [
            'contain' => ['ShowStatuses'],
            'conditions' => ['Shows.is_deleted' => false],
        ];

        $shows = $this->paginate($this->Shows, $paginate_settings);

        $this->set(compact('shows'));
    }

    /**
     * View method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $show = $this->Shows->get($id, [
            'contain' => ['ShowStatuses', 'Seasons', 'ShowDirectors'],
        ]);

        $this->set(compact('show'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function new()
    {
        $show = $this->Shows->newEmptyEntity();
        if ($this->request->is('post')) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $showStatuses = $this->Shows->ShowStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('show', 'showStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $show = $this->Shows->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $showStatuses = $this->Shows->ShowStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('show', 'showStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        try {
            // Allow only DELETE method
            if (!$this->request->is(['DELETE', 'AJAX'])) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Shows', 'Method not allowed, only DELETE method is allowed'),
                ]);
            }

            // Get data from request
            $action = $this->request->getData('action');
            $data   = $this->request->getData();
            \Cake\Log\Log::error(print_r($data, true));

            $show_id = $data['data']['showId'] ?? null;
            if (empty($show_id)) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Shows', 'Show ID is required'),
                ]);
            }

            // Get show from database
            $show = $this->Shows->getById((int) $show_id);
            if (empty($show)) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Shows', 'Show not found'),
                ]);
            }

            // Mark show as deleted and save it
            $show->is_deleted   = true;
            $show->deleted_date = FrozenTime::now();
            if (!$this->Shows->save($show)) {
                return $this->json([
                    'success' => false,
                    'message' => __d('Shows', 'Show could not be deleted'),
                ]);
            }

            // Return success message
            return $this->json([
                'success' => true,
                'message' => __d('Shows', 'Show deleted successfully'),
                'redirect' => '/shows',
            ]);

        } catch (\Exception $e) {
            \Cake\Log\Log::error(print_r($e->getMessage(), true));
            \Cake\Log\Log::error(print_r($e->getTraceAsString(), true));
            return $this->json([
                'success' => false,
                'message' => __d('Shows', 'Show could not be deleted, please try again later'),
            ]);
        }
    }
}