<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

$this->Breadcrumbs->add(__d('user-management', 'User Management '), null, ['class' => 'breadcrumb-item text-muted']);
$this->Breadcrumbs->add(__d('user-management', 'Users'), null, ['class' => 'breadcrumb-item text-dark']);
?>
<?= debug($users) ?>
