<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Role> $roles
 */

$this->Breadcrumbs->add(__d('user-management', 'User Management '), null, ['class' => 'breadcrumb-item text-muted']);
$this->Breadcrumbs->add(__d('user-management', 'Roles'), null, ['class' => 'breadcrumb-item text-dark']);
?>

<?= $this->Html->script('roles.js', ['block' => 'custom-scripts']) ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    <?php foreach ($roles as $role) : ?>
        <div class="col-md-4">
            <div class="col">
                <?= $this->element('roles/info_card', ['role' => $role]) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Role Modals -->
<?= $this->element('roles/modals/empty_modal', ['modal_class' => 'roles-edit-modal', 'modal_dialog_id' => 'roles-modal-content', 'action' => 'edit-role']) ?>
