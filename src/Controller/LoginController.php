<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Login Controller
 *  
 * @property \App\Model\Table\UsersTable $Users
 */
class LoginController extends AppController
{
    function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');

        $this->Authentication->allowUnauthenticated(['index']);
    }

    /**
     * Undocumented function
     *
     * @return \Cake\Http\Response|null Renders view
     */
    public function index(): ?\Cake\Http\Response
    {
        $this->viewBuilder()->setLayout('login');

        $result = $this->Authentication->getResult();        
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/home';
            return $this->redirect($target);
        }       

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }

        $this->set('user', $this->Users->newEmptyEntity());

        return $this->render('login_form');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Login', 'action' => 'index']);
    }
}