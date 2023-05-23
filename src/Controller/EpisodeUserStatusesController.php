<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EpisodeUserStatuses Controller
 *
 * @property \App\Model\Table\EpisodeUserStatusesTable $EpisodeUserStatuses
 * @method \App\Model\Entity\EpisodeUserStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeUserStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Episodes', 'EpisodeStatuses'],
        ];
        $episodeUserStatuses = $this->paginate($this->EpisodeUserStatuses);

        $this->set(compact('episodeUserStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode User Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $episodeUserStatus = $this->EpisodeUserStatuses->get($id, [
            'contain' => ['Users', 'Episodes', 'EpisodeStatuses'],
        ]);

        $this->set(compact('episodeUserStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeUserStatus = $this->EpisodeUserStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $episodeUserStatus = $this->EpisodeUserStatuses->patchEntity($episodeUserStatus, $this->request->getData());
            if ($this->EpisodeUserStatuses->save($episodeUserStatus)) {
                $this->Flash->success(__('The episode user status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode user status could not be saved. Please, try again.'));
        }
        $users = $this->EpisodeUserStatuses->Users->find('list', ['limit' => 200])->all();
        $episodes = $this->EpisodeUserStatuses->Episodes->find('list', ['limit' => 200])->all();
        $episodeStatuses = $this->EpisodeUserStatuses->EpisodeStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeUserStatus', 'users', 'episodes', 'episodeStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode User Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episodeUserStatus = $this->EpisodeUserStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeUserStatus = $this->EpisodeUserStatuses->patchEntity($episodeUserStatus, $this->request->getData());
            if ($this->EpisodeUserStatuses->save($episodeUserStatus)) {
                $this->Flash->success(__('The episode user status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode user status could not be saved. Please, try again.'));
        }
        $users = $this->EpisodeUserStatuses->Users->find('list', ['limit' => 200])->all();
        $episodes = $this->EpisodeUserStatuses->Episodes->find('list', ['limit' => 200])->all();
        $episodeStatuses = $this->EpisodeUserStatuses->EpisodeStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeUserStatus', 'users', 'episodes', 'episodeStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode User Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeUserStatus = $this->EpisodeUserStatuses->get($id);
        if ($this->EpisodeUserStatuses->delete($episodeUserStatus)) {
            $this->Flash->success(__('The episode user status has been deleted.'));
        } else {
            $this->Flash->error(__('The episode user status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
