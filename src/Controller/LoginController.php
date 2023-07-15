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

        $this->Authentication->allowUnauthenticated(['index', 'forgotPassword']);
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

        $this->set('user', $this->Users->newEmptyEntity());

        if ($this->request->is('post') && !$result->isValid() && $result->getStatus() === 'FAILURE_CREDENTIALS_MISSING') {
            $this->Flash->info(__d('login', 'Please enter your username and password'));
            return $this->render('login_form');
        }

        if ($this->request->is('post') && !$result->isValid() && $result->getStatus() === 'FAILURE_IDENTITY_NOT_FOUND') {
            $this->Flash->error(__d('login', 'Username or password is incorrect'));
            return $this->render('login_form');
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__d('login', 'Something went wrong. Please try again'));
            return $this->render('login_form');
        }

        return $this->render('login_form');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Login', 'action' => 'index']);
    }

    /**
     * Prints the forgot password form and handles the form submission
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function forgotPassword()
    {
        // Set the layout to login so that the forgot password form is displayed
        // without the header and footer
        $this->viewBuilder()->setLayout('login');

        return $this->render('forgot_password_form');
    }
}