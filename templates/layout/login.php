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
<html lang="en" dir="ltr">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700" />
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

<body id="kt_body" class="dark-mode auth-bg">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <?php echo $this->Flash->render(); ?>
                    <?php echo $this->fetch('content'); ?>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <?= $this->Html->script('/plugins/global/plugins.bundle.js'); ?>
    <?= $this->Html->script('scripts.bundle.js'); ?>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <?= $this->Html->script('custom/authentication/sign-in/general.js'); ?>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <?= $this->fetch('custom-scripts') ?>
</body>
<!--end::Body-->

</html>