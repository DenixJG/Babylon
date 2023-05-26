<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<!--begin::Roles Card-->
<div class="card card-flush h-md-100">
    <!--begin::Roles Card header-->
    <div class="card-header">
        <!--begin::Roles Card title-->
        <div class="card-title">
            <h2><?= $role->name ?></h2>
        </div>
        <!--end::Roles Card title-->
    </div>
    <!--end::Roles Card header-->
    <!--begin::Roles Card body-->
    <div class="card-body pt-1">
        <!--begin::Users-->
        <div class="fw-bolder text-gray-600 mb-5">Total users with this role: <?= $role->user_count ?></div>
        <!--end::Users-->
        <!--begin::Permissions-->
        <div class="d-flex flex-column text-gray-600">
            <div class="d-flex align-items-center py-2">
                <span class="bullet bg-primary me-3"></span> <?= $role->description ?? '' ?>
            </div>
        </div>
        <!--end::Permissions-->
    </div>
    <!--end::Roles Card body-->
    <!--begin::Roles Card footer-->
    <div class="card-footer flex-wrap pt-0">
        <button data-role-id="<?= $role->id ?? 0 ?>" type="button" class="btn btn-light btn-active-light-primary my-1 btn-edit-roles" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
    </div>
    <!--end::Roles Card footer-->
</div>
<!--end::Roles Card-->
