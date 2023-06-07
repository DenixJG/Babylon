<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
    <div class="menu-fit hover-scroll-y me-lg-n5 pe-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="20px" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer">
        <div class="menu-item <?= $menu === 'home' ? 'here' : ''; ?>">
            <a class="menu-link" href="/">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <?= $this->Svg->getSvgIcon('icons/duotune/general/gen001.svg', 'svg-icon-2'); ?>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title"><?= __d('menu', 'Home'); ?></span>
            </a>
        </div>
        <div class="menu-item pt-5">
            <div class="menu-content">
                <span class="fw-bold text-muted text-uppercase fs-7"><?= __d('menu', 'Media Content') ?></span>
            </div>
        </div>
        <div class="menu-item <?= $menu === 'movies' ? 'here' : ''; ?>">
            <a class="menu-link" href="<?= $this->Url->build(['controller' => 'Movies', 'action' => 'index']); ?>">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <?= $this->Svg->getSvgIcon('icons/duotune/general/gen001.svg', 'svg-icon-2'); ?>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title"><?= __d('menu', 'Movies'); ?></span>
            </a>
        </div>
        <div class="menu-item <?= $menu === 'shows' ? 'here' : ''; ?>">
            <a class="menu-link" href="<?= $this->Url->build(['controller' => 'Shows', 'action' => 'index']); ?>">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                    <?= $this->Svg->getSvgIcon('icons/duotune/general/gen001.svg', 'svg-icon-2'); ?>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title"><?= __d('menu', 'TV Shows'); ?></span>
            </a>
        </div>
        <div class="menu-item pt-5">
            <div class="menu-content">
                <span class="fw-bold text-muted text-uppercase fs-7"><?= __d('menu', 'Configuration') ?></span>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= $menu === 'management' ? 'here show' : ''; ?>"> <!-- here show -->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <?= $this->Svg->getSvgIcon('icons/duotune/general/gen025.svg', 'svg-icon-2'); ?>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title"><?= __d('menu', 'User Management'); ?></span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion <?= $submenu === 'users' ? 'menu-active-bg' : ''; ?>">
                <div class="menu-item">
                    <a class="menu-link <?= $submenu === 'users' ? 'active' : ''; ?>" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title"><?= __d('menu', 'Usuarios'); ?></span>
                    </a>
                </div>
            </div>
            <div class="menu-sub menu-sub-accordion <?= $submenu === 'roles' ? 'menu-active-bg' : ''; ?>"">
                <div class=" menu-item">
                <a class="menu-link <?= $submenu === 'roles' ? 'active' : ''; ?>" href="<?= $this->Url->build(['controller' => 'Roles', 'action' => 'index']); ?>">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title"><?= __d('menu', 'Roles'); ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>