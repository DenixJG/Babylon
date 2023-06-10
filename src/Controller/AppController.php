<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 * 
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \Cake\Controller\Component\FlashComponent $Flash
 * 
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Entity\User $user 
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /** @var string Menu to set active */
    protected $menu = 'home';

    /** @var string Submenu to set active */
    protected $submenu = 'home';

    /** @var string Title for actual secion or controller name */
    protected $section_title = 'Home';

    /** @var \App\Model\Entity\User|null Authenticade user */
    protected $user = null;

    /** @var \App\Model\Table\UsersTable|null Users model table */
    protected $Users = null;

    /** @var string Custom color theme */
    private $theme = 'dark';

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        $this->loadComponent('Authentication.Authentication');

        $this->Users = $this->loadModel('Users');

        // Get identity from Authentication component and set user entity
        $identity = $this->Authentication->getIdentity();
        if ($identity) {
            $this->user = $this->Users->getById($identity->getIdentifier());
            $this->set('logged_user', $this->user);
        }

    }

    public function beforeRender(EventInterface $event)
    {
        $this->viewBuilder()->addHelper('Svg'); // Load SvgHelper only for Craft theme

        // Get theme from query string if exists and update session
        if ($this->request->getQuery('theme')) {
            $this->theme = $this->request->getQuery('theme', 'dark');
            $this->request->getSession()->write('Colors.Theme', $this->theme);
        } else {
            // Get theme from session if exists
            $this->theme = $this->request->getSession()->read('Colors.Theme', 'dark');
        }

        // Set theme - dark or light
        $this->set('theme', $this->theme);
        $this->set('menu', $this->menu);
        $this->set('submenu', $this->submenu);
        $this->set('section_title', $this->section_title);
    }
}