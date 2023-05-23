<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EpisodeNotes Controller
 *
 * @property \App\Model\Table\EpisodeNotesTable $EpisodeNotes
 * @method \App\Model\Entity\EpisodeNote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeNotesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Episodes', 'Users'],
        ];
        $episodeNotes = $this->paginate($this->EpisodeNotes);

        $this->set(compact('episodeNotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode Note id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $episodeNote = $this->EpisodeNotes->get($id, [
            'contain' => ['Episodes', 'Users'],
        ]);

        $this->set(compact('episodeNote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeNote = $this->EpisodeNotes->newEmptyEntity();
        if ($this->request->is('post')) {
            $episodeNote = $this->EpisodeNotes->patchEntity($episodeNote, $this->request->getData());
            if ($this->EpisodeNotes->save($episodeNote)) {
                $this->Flash->success(__('The episode note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode note could not be saved. Please, try again.'));
        }
        $episodes = $this->EpisodeNotes->Episodes->find('list', ['limit' => 200])->all();
        $users = $this->EpisodeNotes->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeNote', 'episodes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode Note id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episodeNote = $this->EpisodeNotes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeNote = $this->EpisodeNotes->patchEntity($episodeNote, $this->request->getData());
            if ($this->EpisodeNotes->save($episodeNote)) {
                $this->Flash->success(__('The episode note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode note could not be saved. Please, try again.'));
        }
        $episodes = $this->EpisodeNotes->Episodes->find('list', ['limit' => 200])->all();
        $users = $this->EpisodeNotes->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeNote', 'episodes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode Note id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeNote = $this->EpisodeNotes->get($id);
        if ($this->EpisodeNotes->delete($episodeNote)) {
            $this->Flash->success(__('The episode note has been deleted.'));
        } else {
            $this->Flash->error(__('The episode note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
