<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EpisodeStatuses Controller
 *
 * @property \App\Model\Table\EpisodeStatusesTable $EpisodeStatuses
 * @method \App\Model\Entity\EpisodeStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $episodeStatuses = $this->paginate($this->EpisodeStatuses);

        $this->set(compact('episodeStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $episodeStatus = $this->EpisodeStatuses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('episodeStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeStatus = $this->EpisodeStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $episodeStatus = $this->EpisodeStatuses->patchEntity($episodeStatus, $this->request->getData());
            if ($this->EpisodeStatuses->save($episodeStatus)) {
                $this->Flash->success(__('The episode status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode status could not be saved. Please, try again.'));
        }
        $this->set(compact('episodeStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episodeStatus = $this->EpisodeStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeStatus = $this->EpisodeStatuses->patchEntity($episodeStatus, $this->request->getData());
            if ($this->EpisodeStatuses->save($episodeStatus)) {
                $this->Flash->success(__('The episode status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode status could not be saved. Please, try again.'));
        }
        $this->set(compact('episodeStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeStatus = $this->EpisodeStatuses->get($id);
        if ($this->EpisodeStatuses->delete($episodeStatus)) {
            $this->Flash->success(__('The episode status has been deleted.'));
        } else {
            $this->Flash->error(__('The episode status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
