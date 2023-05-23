<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ShowDirectors Controller
 *
 * @property \App\Model\Table\ShowDirectorsTable $ShowDirectors
 * @method \App\Model\Entity\ShowDirector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShowDirectorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Shows', 'Directors'],
        ];
        $showDirectors = $this->paginate($this->ShowDirectors);

        $this->set(compact('showDirectors'));
    }

    /**
     * View method
     *
     * @param string|null $id Show Director id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $showDirector = $this->ShowDirectors->get($id, [
            'contain' => ['Shows', 'Directors'],
        ]);

        $this->set(compact('showDirector'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showDirector = $this->ShowDirectors->newEmptyEntity();
        if ($this->request->is('post')) {
            $showDirector = $this->ShowDirectors->patchEntity($showDirector, $this->request->getData());
            if ($this->ShowDirectors->save($showDirector)) {
                $this->Flash->success(__('The show director has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show director could not be saved. Please, try again.'));
        }
        $shows = $this->ShowDirectors->Shows->find('list', ['limit' => 200])->all();
        $directors = $this->ShowDirectors->Directors->find('list', ['limit' => 200])->all();
        $this->set(compact('showDirector', 'shows', 'directors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Show Director id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $showDirector = $this->ShowDirectors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $showDirector = $this->ShowDirectors->patchEntity($showDirector, $this->request->getData());
            if ($this->ShowDirectors->save($showDirector)) {
                $this->Flash->success(__('The show director has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show director could not be saved. Please, try again.'));
        }
        $shows = $this->ShowDirectors->Shows->find('list', ['limit' => 200])->all();
        $directors = $this->ShowDirectors->Directors->find('list', ['limit' => 200])->all();
        $this->set(compact('showDirector', 'shows', 'directors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Show Director id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $showDirector = $this->ShowDirectors->get($id);
        if ($this->ShowDirectors->delete($showDirector)) {
            $this->Flash->success(__('The show director has been deleted.'));
        } else {
            $this->Flash->error(__('The show director could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
