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
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?= $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
        <?= $this->fetch('title'); ?>
    </title>

    <?= $this->Html->meta('icon'); ?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')) ?>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <?= $this->Html->css('/plugins/custom/leaflet/leaflet.bundle.css'); ?>
    <!--end::Page Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <?php if ($theme === 'dark'): ?>
        <?= $this->Html->css('/plugins/global/plugins.dark.bundle.css') ?>
        <?= $this->Html->css('style.dark.bundle.css') ?>
    <?php else: ?>
        <?= $this->Html->css('/plugins/global/plugins.bundle.css'); ?>
        <?= $this->Html->css('style.bundle.css'); ?>
    <?php endif; ?>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="dark-mode header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-default aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto pt-9 pb-5" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="/">
                        <img alt="Logo" src="<?= $this->Url->image('logos/logo-default.svg'); ?>"
                            class="max-h-50px logo-default" />
                        <img alt="Logo" src="<?= $this->Url->image('logos/logo-minimize.svg'); ?>"
                            class="max-h-50px logo-minimize" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::Aside Menu-->
                    <!--begin::Menu-->
                    <?= $this->element('menu/admin'); ?>
                    <!--end::Menu-->
                </div>
                <!--end::Aside menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <?= $this->element('menu/header') ?>
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder my-1 fs-2">
                                    <?= $section_title ?>
                                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <?= $this->Breadcrumbs->render() ?>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="fs-6 d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div class="container-xxl">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>
                            <!--begin::Modals-->
                            <!-- Add modals here -->
                            <!--end::Modals-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-2">
                                <?= date('Y') ?>
                            </span>
                            <a href="http://babylon.rafapop.com" target="_blank"
                                class="text-gray-800 text-hover-primary">
                                <?= __d('footer', 'Babylon Project') ?>
                            </a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://keenthemes.com/support" target="_blank"
                                    class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme"
                                    target="_blank" class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <?= $this->Html->script('/plugins/global/plugins.bundle.js'); ?>
    <?= $this->Html->script('scripts.bundle.js'); ?>
    <?= $this->Html->script('/plugins/custom/hotkeys/hotkeys.min.js'); ?>
    <!--end::Global Javascript Bundle-->

    <!--begin::Page Vendors Javascript(used by this page)-->
    <?= $this->Html->script('/plugins/custom/leaflet/leaflet.bundle.js'); ?>
    <!--end::Page Vendors Javascript-->

    <!--begin::Page Custom Javascript(used by this page)-->
    <?= $this->Html->script('custom/modals/create-app.js'); ?>
    <?= $this->Html->script('custom/modals/select-location.js'); ?>
    <?= $this->Html->script('custom/widgets.js'); ?>
    <?= $this->Html->script('custom/apps/chat/chat.js'); ?>
    <?= $this->Html->script('custom/modals/create-project.bundle.js'); ?>
    <?= $this->Html->script('custom/modals/upgrade-plan.js'); ?>
        
    <?= $this->Html->script('callback_response.js'); ?>
    <?= $this->Html->script('utils.js'); ?>
    <?= $this->fetch('custom-scripts') ?>

    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>