<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MovieStatuses Controller
 *
 * @property \App\Model\Table\MovieStatusesTable $MovieStatuses
 * @method \App\Model\Entity\MovieStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovieStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $movieStatuses = $this->paginate($this->MovieStatuses);

        $this->set(compact('movieStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Movie Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movieStatus = $this->MovieStatuses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('movieStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movieStatus = $this->MovieStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $movieStatus = $this->MovieStatuses->patchEntity($movieStatus, $this->request->getData());
            if ($this->MovieStatuses->save($movieStatus)) {
                $this->Flash->success(__('The movie status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie status could not be saved. Please, try again.'));
        }
        $this->set(compact('movieStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movieStatus = $this->MovieStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movieStatus = $this->MovieStatuses->patchEntity($movieStatus, $this->request->getData());
            if ($this->MovieStatuses->save($movieStatus)) {
                $this->Flash->success(__('The movie status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie status could not be saved. Please, try again.'));
        }
        $this->set(compact('movieStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movieStatus = $this->MovieStatuses->get($id);
        if ($this->MovieStatuses->delete($movieStatus)) {
            $this->Flash->success(__('The movie status has been deleted.'));
        } else {
            $this->Flash->error(__('The movie status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
