<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * LastWatchedEpisodes Controller
 *
 * @property \App\Model\Table\LastWatchedEpisodesTable $LastWatchedEpisodes
 * @method \App\Model\Entity\LastWatchedEpisode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LastWatchedEpisodesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Episodes'],
        ];
        $lastWatchedEpisodes = $this->paginate($this->LastWatchedEpisodes);

        $this->set(compact('lastWatchedEpisodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Last Watched Episode id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lastWatchedEpisode = $this->LastWatchedEpisodes->get($id, [
            'contain' => ['Episodes'],
        ]);

        $this->set(compact('lastWatchedEpisode'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lastWatchedEpisode = $this->LastWatchedEpisodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $lastWatchedEpisode = $this->LastWatchedEpisodes->patchEntity($lastWatchedEpisode, $this->request->getData());
            if ($this->LastWatchedEpisodes->save($lastWatchedEpisode)) {
                $this->Flash->success(__('The last watched episode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The last watched episode could not be saved. Please, try again.'));
        }
        $episodes = $this->LastWatchedEpisodes->Episodes->find('list', ['limit' => 200])->all();
        $this->set(compact('lastWatchedEpisode', 'episodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Last Watched Episode id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lastWatchedEpisode = $this->LastWatchedEpisodes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lastWatchedEpisode = $this->LastWatchedEpisodes->patchEntity($lastWatchedEpisode, $this->request->getData());
            if ($this->LastWatchedEpisodes->save($lastWatchedEpisode)) {
                $this->Flash->success(__('The last watched episode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The last watched episode could not be saved. Please, try again.'));
        }
        $episodes = $this->LastWatchedEpisodes->Episodes->find('list', ['limit' => 200])->all();
        $this->set(compact('lastWatchedEpisode', 'episodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Last Watched Episode id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lastWatchedEpisode = $this->LastWatchedEpisodes->get($id);
        if ($this->LastWatchedEpisodes->delete($lastWatchedEpisode)) {
            $this->Flash->success(__('The last watched episode has been deleted.'));
        } else {
            $this->Flash->error(__('The last watched episode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
