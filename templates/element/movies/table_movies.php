<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>

<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable">
        <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <?= $this->Paginator->sort('Movies.id', __d('movies', 'ID'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Movies.title', __d('movies', 'Title'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('MovieStatuses.name', __d('movies', 'Status'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Movies.release_date', __d('movies', 'Release'), ['escape' => false]); ?>
                <th class="text-end min-w-70px"><?= __d('movies', 'Actions') ?></th>
            </tr>
        </thead>
        <tbody class="fw-bold text-gray-600">
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?= $movie->id ?></td>
                    <td><?= $movie->title ?? '' ?></td>
                    <td><?= $movie->movie_status->name ?? '' ?></td>
                    <td><?= $movie->release_date->toDateString() ?? '' ?></td>
                    <td class="text-end">
                        <?= $this->Html->link(
                            '<i class="fa fa-edit text-primary fs-3"></i>',
                            ['controller' => 'Movies', 'action' => 'edit', $movie->id],
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