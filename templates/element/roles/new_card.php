<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<!--begin::Roles Card-->
<div class="card card-flush h-md-100">
    <!--begin::Roles Card body-->
    <div class="card-body d-flex flex-center">
        <!--begin::Button-->
        <button class="btn btn-clear d-flex flex-column flex-center btn-add-role" data-bs-toggle="modal"
            data-bs-target="#kt_modal_new-role">
            <!--begin::Illustration-->
            <?= $this->Html->image("illustrations/sigma-1/4.png", ["class" => "mw-100 mh-100px mb-14"]) ?>
            <!--end::Illustration-->
            <!--begin::Label-->
            <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
            <!--end::Label-->
        </button>
        <!--begin::Button-->
    </div>
</div>
<!--end::Roles Card-->
