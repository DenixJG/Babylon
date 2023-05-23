<?php
/**
 * @var \App\View\AppView $this
 */

$this->Breadcrumbs->add(__d('cake', 'User Management'), null, ['class' => 'breadcrumb-item text-muted']);
$this->Breadcrumbs->add(__d('cake', 'Users'), null, ['class' => 'breadcrumb-item text-dark']);
?>

<?= $users; ?>
