<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\User;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->menu = 'management';
        $this->submenu = 'users';
        $this->section_title = 'Users';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $customFinderConditions['conditions'] = '';

        if ($this->request->is('post')) {
            $search = $this->request->getData('search');

            if (!empty($search)) {
                $searchConditions = [];
                $searchConditions['Users.username LIKE'] = '%' . $search . '%';
                $searchConditions['Users.email LIKE'] = '%' . $search . '%';

                $customFinderConditions['conditions'] = $searchConditions;

                $this->request->getSession()->write('Users.List.Search', $search);
                $this->request->getSession()->write('Users.List.Conditions', $searchConditions);
            } else {
                $this->request->getSession()->delete('Users.List.Search');
                $this->request->getSession()->delete('Users.List.Conditions');
            }
        } else {
            // Get conditions from session if they exist
            $session = $this->request->getSession();
            if ($session->check('Users.List.conditions')) {
                $this->set('search', $session->read('Users.List.Search'));
            }

            // Get conditions from search form
            if ($session->check('Users.List.Conditions')) {
                $customFinderConditions['conditions'] = $session->read('Users.List.Conditions');
            }
        }

        $settings = [
            'contain' => ['Roles'],
            'order' => ['Users.username' => 'ASC'],
            'finder' => ['forList' => $customFinderConditions],
        ];        

        /** @var User[] */
        $users = $this->paginate($this->Users, $settings)->toArray();

        $this->set(compact('users'));

        return $this->render();
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'EpisodeNotes', 'EpisodeUserStatuses', 'LastWatchedEpisodes', 'Notes'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
