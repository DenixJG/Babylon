<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QueueProcesses Controller
 *
 * @method \App\Model\Entity\QueueProcess[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QueueProcessesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $queueProcesses = $this->paginate($this->QueueProcesses);

        $this->set(compact('queueProcesses'));
    }

    /**
     * View method
     *
     * @param string|null $id Queue Process id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $queueProcess = $this->QueueProcesses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('queueProcess'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $queueProcess = $this->QueueProcesses->newEmptyEntity();
        if ($this->request->is('post')) {
            $queueProcess = $this->QueueProcesses->patchEntity($queueProcess, $this->request->getData());
            if ($this->QueueProcesses->save($queueProcess)) {
                $this->Flash->success(__('The queue process has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queue process could not be saved. Please, try again.'));
        }
        $this->set(compact('queueProcess'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Queue Process id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $queueProcess = $this->QueueProcesses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $queueProcess = $this->QueueProcesses->patchEntity($queueProcess, $this->request->getData());
            if ($this->QueueProcesses->save($queueProcess)) {
                $this->Flash->success(__('The queue process has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queue process could not be saved. Please, try again.'));
        }
        $this->set(compact('queueProcess'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Queue Process id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $queueProcess = $this->QueueProcesses->get($id);
        if ($this->QueueProcesses->delete($queueProcess)) {
            $this->Flash->success(__('The queue process has been deleted.'));
        } else {
            $this->Flash->error(__('The queue process could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
