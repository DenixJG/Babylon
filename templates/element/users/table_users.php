<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable">
        <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <?= $this->Paginator->sort('Users.username', __d('users', 'Username'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Users.email', __d('users', 'Email'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Roles.name', __d('users', 'Rol'), ['escape' => false]); ?>
                <th class="text-end min-w-70px"><?= __d('users', 'Actions') ?></th>
            </tr>
        </thead>
        <tbody class="fw-bold text-gray-600">
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->username ?? '' ?></td>
                    <td><?= $user->email ?? '' ?></td>
                    <td><?= $user->role->name ?? '' ?></td>
                    <td class="text-end">
                        <?= $this->Html->link(
                            '<i class="fa fa-edit text-primary fs-3"></i>',
                            ['controller' => 'Users', 'action' => 'edit', $user->id],
                            ['class' => 'menu-link px-3', 'escape' => false]
                        ); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="d-flex align-items-center justify-content-center">
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <?= $this->Paginator->prev(' < ' . __d('paginacion', '')); ?>
                <?= $this->Paginator->numbers(['first' => __d('paginacion', 'First page')]); ?>
                <?= $this->Paginator->next(' > ' . __d('paginacion', '')); ?>
            </ul>
        </div>
    </div>
</div>