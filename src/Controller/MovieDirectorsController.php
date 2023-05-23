<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MovieDirectors Controller
 *
 * @property \App\Model\Table\MovieDirectorsTable $MovieDirectors
 * @method \App\Model\Entity\MovieDirector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovieDirectorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Directors'],
        ];
        $movieDirectors = $this->paginate($this->MovieDirectors);

        $this->set(compact('movieDirectors'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie Director id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movieDirector = $this->MovieDirectors->get($id, [
            'contain' => ['Movies', 'Directors'],
        ]);

        $this->set(compact('movieDirector'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movieDirector = $this->MovieDirectors->newEmptyEntity();
        if ($this->request->is('post')) {
            $movieDirector = $this->MovieDirectors->patchEntity($movieDirector, $this->request->getData());
            if ($this->MovieDirectors->save($movieDirector)) {
                $this->Flash->success(__('The movie director has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie director could not be saved. Please, try again.'));
        }
        $movies = $this->MovieDirectors->Movies->find('list', ['limit' => 200])->all();
        $directors = $this->MovieDirectors->Directors->find('list', ['limit' => 200])->all();
        $this->set(compact('movieDirector', 'movies', 'directors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie Director id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movieDirector = $this->MovieDirectors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movieDirector = $this->MovieDirectors->patchEntity($movieDirector, $this->request->getData());
            if ($this->MovieDirectors->save($movieDirector)) {
                $this->Flash->success(__('The movie director has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie director could not be saved. Please, try again.'));
        }
        $movies = $this->MovieDirectors->Movies->find('list', ['limit' => 200])->all();
        $directors = $this->MovieDirectors->Directors->find('list', ['limit' => 200])->all();
        $this->set(compact('movieDirector', 'movies', 'directors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie Director id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movieDirector = $this->MovieDirectors->get($id);
        if ($this->MovieDirectors->delete($movieDirector)) {
            $this->Flash->success(__('The movie director has been deleted.'));
        } else {
            $this->Flash->error(__('The movie director could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
