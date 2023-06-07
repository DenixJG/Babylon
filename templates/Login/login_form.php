<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="w-lg-700px p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <?= $this->Form->create($user, ['class' => 'form w-100', 'novalidate' => 'novalidate', 'id' => 'login-form']); ?>
    <!--begin::Heading-->
    <div class="container px-5">
        <div class="row gx-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-10">
                        <h1 class="text-primary-color mb-3">
                            <?= __d('login', 'Welcome to Babylon Project'); ?>
                        </h1>
                        <a href="/" class="py-9">
                            <img alt="Logo" src="https://upload.wikimedia.org/wikipedia/commons/1/1e/RPC-JP_Logo.png"
                                class="h-70px" />
                        </a>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 text-secondary-color">
                            <?= __d('login', 'Username'); ?>
                        </label>
                        <?= $this->Form->control('username', ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'label' => false]) ?>
                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fs-6 mb-0 text-secondary-color">
                                <?= __d('login', 'Password'); ?>
                            </label>
                        </div>
                        <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'label' => false]) ?>
                        <div style="text-align: right; margin-top: 1rem;">
                            <?= $this->Html->link(__d('login', 'Forgot password'), ['controller' => 'Login', 'action' => 'forgot-password'], ['escape' => false, 'class' => 'ink-primary fs-6 mt-2']) ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary btn-lg px-4">
                            <span class="indicator-label"><strong>
                                    <?= __d('login', 'LOGIN'); ?>
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