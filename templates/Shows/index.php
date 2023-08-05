<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Show> $shows
 */

$this->Breadcrumbs->add(__d('shows', 'Shows'), null, ['class' => 'breadcrumb-item text-muted']);
$this->Breadcrumbs->add(__d('shows', 'List'), null, ['class' => 'breadcrumb-item text-dark']);
?>

<?= $this->Html->script('shows/delete_show.js', ['block' => 'custom-scripts']); ?>

<div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-5 pb-0">
        <div class="row mb-10">
            <!-- Search Box -->
            <div class="col-sm-8 col-xl-10 mb-15 mb-xl-0 text-start">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <?= $this->Form->control('search', [
                            'type' => 'text',
                            'class' => 'form-control form-control-solid ps-15',
                            'id' => 'search',
                            'placeholder' => __d('events', 'Buscar...'),
                            'data-kt-customer-table-filter' => 'search',
                            'label' => false,
                            'value' => (isset($search)) ? $search : ''
                        ]); ?>
                    </div>
                </div>
            </div>

            <!-- Create Button -->
            <div class="col-sm-4 col-xl-2 mb-15 mb-xl-0 text-end">
                <?= $this->Html->link(
                    '<i class="fas fa-plus text-white"></i>',
                    [
                        'controller' => 'Shows',
                        'action' => 'new',
                    ],
                    [
                        'escape' => false,
                        'class' => 'btn btn-lg btn-primary fw-bolder'
                    ]
                )
                    ?>
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="dataTables_wrapper dt-bootstrap4 no-footer" id="container-table-users">
                <?= $this->element('shows/table_shows'); ?>
            </div>
        </div>

    </div>
</div>