<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<div class="modal-content">
    <div class="modal-header">
        <h2 class="fw-bolder">
            <?= $modal_title ?>
        </h2>
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-roles-modal-action="close">
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
                        fill="black"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black">
                    </rect>
                </svg>
            </span>
        </div>
    </div>
    <div class="modal-body scroll-y mx-5 my-7">
        <?= $this->Form->create($role, [
            'id'    => 'roles-form',
            'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework',
        ]) ?>
        <?= $this->Form->hidden('Roles.id') ?>
        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_update_role_header"
            data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px"
            style="max-height: 515px;">
            <div class="col-12 col-xk-6 mb-xl-3">
                <?= $this->Form->control('Roles.name', [
                    'class'       => 'form-control form-control-solid',
                    'placeholder' => __d('role', 'Enter a role name'),
                    'escape'      => false,
                    'label'       => [
                        'text'  => __d('role', 'Role name'),
                        'class' => 'fs-5 fw-bolder form-label mb-2',
                    ],
                ]) ?>
            </div>
            <div class="col-12 col-xk-6 mb-xl-3 mt-3">
                <?= $this->Form->control('Roles.description', [
                    'class'       => 'form-control form-control-solid',
                    'placeholder' => __d('role', 'Enter a role name'),
                    'escape'      => false,
                    'label'       => [
                        'text'  => __d('role', 'Role description'),
                        'class' => 'fs-5 fw-bolder form-label mb-2',
                    ],
                ]) ?>
            </div>

            <div class="col-6 col-xk-6 mb-xl-3 mt-4">
                <div class="form-check form-switch form-check-custom form-check-solid">
                    <?= $this->Form->control('Roles.is_admin', [
                        'type'  => 'checkbox',
                        'class' => 'form-check-input',
                        'label' => false
                    ]); ?>
                    <?= $this->Form->label('active', __d('roles', 'Is Admin'), [
                        'class' => 'form-check-label',
                        'for'   => 'is_admin'
                    ]); ?>
                </div>
            </div>

            <div class="col-6 col-xk-6 mb-xl-3 mt-1">
                <div class="form-check form-switch form-check-custom form-check-solid">
                    <?= $this->Form->control('Roles.is_user', [
                        'type'  => 'checkbox',
                        'class' => 'form-check-input',
                        'label' => false
                    ]); ?>
                    <?= $this->Form->label('active', __d('roles', 'Is User'), [
                        'class' => 'form-check-label',
                        'for'   => 'is_user'
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="text-center pt-15">
            <button type="reset" class="btn btn-light me-3" data-roles-modal-action="cancel">Discard</button>
            <button type="button" class="btn btn-primary" data-roles-modal-action="submit">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
