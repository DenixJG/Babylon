<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Role> $roles
 */

$this->Breadcrumbs->add(__d('user-management', 'User Management '), null, ['class' => 'breadcrumb-item text-muted']);
$this->Breadcrumbs->add(__d('user-management', 'Roles'), null, ['class' => 'breadcrumb-item text-dark']);
?>
<?= debug($roles) ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    <!-- TODO: Move this col to elements and use a foreach to render all roles -->
    <div class="col-md-4">
        <!--begin::Card-->
        <div class="card card-flush h-md-100">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Administrator</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-1">
                <!--begin::Users-->
                <div class="fw-bolder text-gray-600 mb-5">Total users with this role: 5</div>
                <!--end::Users-->
                <!--begin::Permissions-->
                <div class="d-flex flex-column text-gray-600">
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>All Admin Controls
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>View and Edit Financial Summaries
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>Enabled Bulk Reports
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>View and Edit Payouts
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>View and Edit Disputes
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>
                        <em>and 7 more...</em>
                    </div>
                </div>
                <!--end::Permissions-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer flex-wrap pt-0">
                <a href="../dist/apps/user-management/roles/view.html" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Card-->
    </div>

</div>
