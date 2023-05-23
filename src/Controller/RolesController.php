<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->menu = 'management';
        $this->submenu = 'roles';
        $this->section_title = 'User Management';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $roles = 'Hello roles!';

        $this->set(compact('roles'));
    }
}
