<?php

declare(strict_types=1);

namespace App\Controller;

use App\Utils\Utils;
use Cake\Http\Client\Response;
use Cake\Log\Log;
use stdClass;

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
        $this->section_title = 'Roles';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $roles = $this->Roles->getAllRoles();

        $this->set(compact('roles'));
    }

    /**
     * This method is used to get all ajax requests and process them
     *
     * Send the request to the correct method based on the custom-action attribute
     * of the modal element
     *
     * @return void
     */
    public function ajax()
    {
        $this->request->allowMethod(['post']);

        Log::error(print_r($this->request->getData(), true));
        $action = $this->request->getData('action');

        $response = new stdClass();
        switch ($action) {
            case 'edit-role':
                return $this->editRole();
                break;
            default:
                $this->Flash->error(__('Invalid request'));
                break;
        }

        Log::error(print_r($response, true));
        $this->set('response', $response);
        $this->render('ajax_response');
    }

    /**
     * Edit Role method - This method is used to edit a role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    private function editRole()
    {
        $this->request->allowMethod(['post']);

        $role_id = $this->request->getData('data')['role_id'];
        if (empty($role_id)) {
            $this->Flash->error(__('Invalid request'));
            return $this->redirect(['action' => 'index']);
        }

        $role = $this->Roles->get($role_id);
        Log::error(print_r($role, true));

        $this->set('role', $role);
        $this->set('modal_title', 'Edit Role - ' . $role->name);
        $this->render('/element/roles/modals/edit_role_content');
    }
}
