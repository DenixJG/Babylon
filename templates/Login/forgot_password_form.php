<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="w-lg-700px p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <?= $this->Form->create(null, ['class' => 'form w-100', 'novalidate' => 'novalidate', 'id' => 'forgot-password-form']); ?>
    <!--begin::Heading-->
    <div class="container px-5">
        <div class="row gx-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-10">
                        <h1 class="text-primary-color mb-3">
                            <?= __d('login', 'Restore Password'); ?>
                        </h1>                        
                    </div>                    
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 text-secondary-color">
                            <?= __d('login', 'Email'); ?>
                        </label>
                        <?= $this->Form->control('email', [
                            'class' => 'form-control form-control-lg form-control-solid',
                            'autocomplete' => 'off',
                            'label' => false
                        ]) ?>
                    </div>
                    <div class="alert alert-secondary d-flex flex-column flex-sm-row p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <span>
                                <?= __d('login', 'Enter your email to reset your password.'); ?>                                
                            </span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary btn-lg px-4">
                            <span class="indicator-label"><strong>
                                    <?= __d('login', 'Send'); ?>
                                </strong></span>
                            <span class="indicator-progress">
                                <?= __d('login', 'Please wait...'); ?>
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>