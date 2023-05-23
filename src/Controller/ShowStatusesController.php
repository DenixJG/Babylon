<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ShowStatuses Controller
 *
 * @property \App\Model\Table\ShowStatusesTable $ShowStatuses
 * @method \App\Model\Entity\ShowStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShowStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $showStatuses = $this->paginate($this->ShowStatuses);

        $this->set(compact('showStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Show Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $showStatus = $this->ShowStatuses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('showStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showStatus = $this->ShowStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $showStatus = $this->ShowStatuses->patchEntity($showStatus, $this->request->getData());
            if ($this->ShowStatuses->save($showStatus)) {
                $this->Flash->success(__('The show status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show status could not be saved. Please, try again.'));
        }
        $this->set(compact('showStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Show Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $showStatus = $this->ShowStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $showStatus = $this->ShowStatuses->patchEntity($showStatus, $this->request->getData());
            if ($this->ShowStatuses->save($showStatus)) {
                $this->Flash->success(__('The show status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show status could not be saved. Please, try again.'));
        }
        $this->set(compact('showStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Show Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $showStatus = $this->ShowStatuses->get($id);
        if ($this->ShowStatuses->delete($showStatus)) {
            $this->Flash->success(__('The show status has been deleted.'));
        } else {
            $this->Flash->error(__('The show status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
