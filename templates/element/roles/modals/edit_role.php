<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Role> $role
 */
?>

<div class="modal fade" id="kt_modal_update_role" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder">Update Role</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 my-7">
                <?= $this->Form->create(null, [
                    'id' => 'kt_modal_update_role_form',
                    'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework',
                    'action' => '#',
                ]) ?>
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px" style="max-height: 515px;">
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <label class="fs-5 fw-bolder form-label mb-2">
                            <span class="required">Role name</span>
                        </label>
                        <input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="Developer">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>

                <div class="text-center pt-15">
                    <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                    <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
