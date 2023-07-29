<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>

<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable">
        <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">                
                <?= $this->Paginator->sort('Shows.title', __d('shows', 'Title'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Shows.original_name', __d('shows', 'Original Title'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('ShowStatuses.name', __d('shows', 'Status'), ['escape' => false]); ?>                
                <?= $this->Paginator->sort('Shows.first_air_date', __d('shows', 'First Air Date'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Shows.last_air_date', __d('shows', 'Last Air Date'), ['escape' => false]); ?>
                <th class="text-end min-w-70px"><?= __d('shows', 'Actions') ?></th>
            </tr>
        </thead>
        <tbody class="fw-bold text-gray-600">
            <?php foreach ($shows as $show) : ?>
                <tr>                    
                    <td><?= $show->title ?? '' ?></td>
                    <td><?= $show->original_name ?? '' ?></td>
                    <td><?= $show->show_status->name ?? '' ?></td>                    
                    <td>
                        <?= $this->Time->i18nFormat(
                            $show->first_air_date,
                            'dd/MM/yyyy',
                            ''
                        ); ?>
                    </td>
                    <td>
                        <?= $this->Time->i18nFormat(
                            $show->last_air_date,
                            'dd/MM/yyyy',
                            ''
                        ); ?>
                    </td>
                    <td class="text-end">
                        <?= $this->Html->link(
                            '<i class="fa fa-edit text-primary fs-3"></i>',
                            ['controller' => 'Shows', 'action' => 'edit', $show->id],
                            ['class' => 'menu-link px-3', 'escape' => false]
                        ); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Pagination -->
<div class="row">
    <div class="d-flex align-items-center justify-content-center">
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <?= $this->Paginator->prev(' < ' . __d('paginacion', '')); ?>
                <?= $this->Paginator->numbers(['first' => __d('paginacion', 'First page')]); ?>
                <?= $this->Paginator->next(' > ' . __d('paginacion', '')); ?>
            </ul>
        </div>
    </div>
</div>