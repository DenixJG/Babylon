<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QueuedJobs Controller
 *
 * @method \App\Model\Entity\QueuedJob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QueuedJobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $queuedJobs = $this->paginate($this->QueuedJobs);

        $this->set(compact('queuedJobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Queued Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $queuedJob = $this->QueuedJobs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('queuedJob'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $queuedJob = $this->QueuedJobs->newEmptyEntity();
        if ($this->request->is('post')) {
            $queuedJob = $this->QueuedJobs->patchEntity($queuedJob, $this->request->getData());
            if ($this->QueuedJobs->save($queuedJob)) {
                $this->Flash->success(__('The queued job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queued job could not be saved. Please, try again.'));
        }
        $this->set(compact('queuedJob'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Queued Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $queuedJob = $this->QueuedJobs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $queuedJob = $this->QueuedJobs->patchEntity($queuedJob, $this->request->getData());
            if ($this->QueuedJobs->save($queuedJob)) {
                $this->Flash->success(__('The queued job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queued job could not be saved. Please, try again.'));
        }
        $this->set(compact('queuedJob'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Queued Job id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $queuedJob = $this->QueuedJobs->get($id);
        if ($this->QueuedJobs->delete($queuedJob)) {
            $this->Flash->success(__('The queued job has been deleted.'));
        } else {
            $this->Flash->error(__('The queued job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
