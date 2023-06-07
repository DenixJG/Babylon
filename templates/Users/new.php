<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>

<?php $this->Breadcrumbs->add(__d('breadcrumbs', 'Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'breadcrumb-item text-secondary-color']); ?>
<?php $this->Breadcrumbs->add(__d('breadcrumbs', 'New'), null, ['class' => 'breadcrumb-item text-dark active text-secondary-color']); ?>

<?= $this->Html->script('users/new.js', ['block' => 'script']); ?>

<div class="card mb-6 mb-xxl-9">
    <div class="card-body py-10">
        <?= $this->Form->create($user, ['id' => 'user-new-form', 'novalidate' => true]); ?>
        <?= $this->Form->hidden('id', ['value' => $user->id]); ?>
        <h2 class="">
            <?= __d('users', 'Add user'); ?>
        </h2>
        <hr class="separator-dashed">
        <div class="row mb-10">
            <div class="col-12 col-xl-6 mb-15 mb-xl-5">
                <?= $this->Form->control('username', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text' => __d('users', 'Username')
                    ]
                ]); ?>
            </div>
            <div class="col-12 col-xl-6 mb-15 mb-xl-5">
                <?= $this->Form->control('email', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text' => __d('users', 'Email')
                    ]
                ]); ?>
            </div>
            <div class="col-12 col-xl-6 mb-15 mb-xl-5">
                <?= $this->Form->control('password', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text' => __d('users', 'Password')
                    ]
                ]); ?>
            </div>
            <div class="col-6 col-xk-6 mb-xl-5">
                <?= $this->Form->control('role_id', [
                    'type' => 'select',
                    'options' => $roles,
                    'class' => 'text-dark-light form-select',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text' => __d('users', 'Role'),
                    ],
                    'empty' => __d('events', '- Select -'),
                ]); ?>
            </div>
            <div class="col-6 col-xk-6 mb-xl-5 mt-3">
                <div class="form-check form-switch form-check-custom form-check-solid">
                    <?= $this->Form->control('active', [
                        'type' => 'checkbox',
                        'class' => 'form-check-input',
                        'label' => false
                    ]); ?>
                    <?= $this->Form->label('active', __d('users', 'Active'), [
                        'class' => 'form-check-label',
                        'for' => 'active'
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-xl-6 mb-15 mb-xl-0 pe-5">
                <?= $this->Html->link(
                    '<i class="fas fa-angle-left mb-1"></i>' . __d('buttons', 'Go back'),
                    [
                        'controller' => 'Users',
                        'action' => 'index'
                    ],
                    [
                        'class' => 'btn btn-lg btn-secondary me-3 my-2',
                        'escape' => false
                    ]
                ) ?>
            </div>
            <div class="col-xl-6 mb-15 mb-xl-0 pe-5  text-end">
                <?= $this->Form->postButton(
                    __d('buttons', 'Save'),
                    [
                        'controller' => 'Users',
                        'action' => 'new',
                    ],
                    [
                        'class' => 'btn btn-lg btn-primary me-3 my-2',
                        'id' => 'btn-save-user'
                    ]
                )
                    ?>
                <a href="javascript:;" class="btn btn-lg btn-primary me-3 my-2 d-none" id="btn-save-user-spinner">
                    <span class="spinner-border spinner-border-sm me-4" role="status" aria-hidden="true"></span>
                    <?= __d('buttons', 'Save'); ?>
                </a>
            </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>