<?php

declare(strict_types=1);

namespace App\Controller;

use App\Utils\Utils;
use Cake\Http\Client\Response;
use Cake\Log\Log;
use Phinx\Util\Util;
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
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function ajax()
    {
        $this->request->allowMethod(['post']);

        Log::error(print_r($this->request->getData(), true));
        $action = $this->request->getData('action');

        $response = new stdClass();
        switch ($action) {
            case 'edit-role':
                $response = $this->editRole();
                break;
            case 'save-role-data':
                $response = $this->saveRoleData();
                break;
            default:
                $response->status = 'error';
                break;
        }

        $this->set('response', $response);
        $this->render('json');
    }

    /**
     * Edit Role method - This method is used to show the edit role modal
     * and populate it with the role data
     *
     * @return stdClass $response - The custom response object
     */
    private function editRole()
    {
        $response = new stdClass();
        $response->status = 400;

        $role_id = $this->request->getData('data')['role_id'];
        if (empty($role_id)) {
            $response->message = 'Invalid request';
            return $response;
        }

        $role = $this->Roles->get($role_id);
        if (empty($role)) {
            $response->message = 'Invalid request';
            return $response;
        }

        $response->status = 200;
        $response->content = Utils::getElement('roles/modals/edit_role_content', [
            'modal_title' => 'Edit Role - ' . $role->name,
            'role' => $role,
        ]);

        return $response;
    }

    /**
     * Save Role Data method - This method is used to save the role data
     * after the edit role modal is submitted, also used to create new roles
     * if the role_id is empty or 0
     *
     * @return stdClass $response - The custom response object
     */
    private function saveRoleData()
    {
        $this->request->allowMethod(['post']);

        $response = new stdClass();
        $response->status = 400;

        $role_data = $this->request->getData('data')['role_data'];
        if (empty($role_data)) {
            $response->message = 'Invalid request';
            return $response;
        }

        Log::error(print_r('Role data from client', true));
        Log::error(print_r($role_data, true));

        if (!isset($role_data['id']) || empty($role_data['id'])) {
            $role = $this->Roles->newEmptyEntity();
        } else {
            $role = $this->Roles->get($role_data['id']);
        }

        $role = $this->Roles->patchEntity($role, $role_data);
        Log::error(print_r('Role data after patching', true));
        Log::error(print_r($role, true));

        $response->status = 200;
        $response->message = __d('roles', 'The role has been saved');
        
        return $response;
    }
}
