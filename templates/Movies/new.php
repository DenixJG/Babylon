<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 * @var \Cake\Collection\CollectionInterface|string[] $movieStatuses
 */
?>
<?php $this->Breadcrumbs->add(__d('breadcrumbs', 'Movies'), ['controller' => 'Movies', 'action' => 'index'], ['class' => 'breadcrumb-item text-secondary-color']); ?>
<?php $this->Breadcrumbs->add(__d('breadcrumbs', 'New'), null, ['class' => 'breadcrumb-item text-dark active text-secondary-color']); ?>

<?= $this->Html->script('movies/new.js', ['block' => 'script']); ?>

<div class="card mb-6 mb-xxl-9">
    <div class="card-body py-10">
        <?= $this->Form->create($movie, ['id' => 'movie-new-form', 'novalidate' => true]); ?>
        <?= $this->Form->hidden('id', ['value' => $movie->id]); ?>
        <h2 class="">
            <?= __d('movies', 'Movie Data'); ?>
        </h2>
        <hr class="separator-dashed">
        <div class="row mb-10">
            <div class="col-12 col-xl-5 mb-15 mb-xl-5">
                <?= $this->Form->control('title', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text'  => __d('movies', 'Title')
                    ]
                ]); ?>
            </div>
            <div class="col-12 col-xl-5 mb-15 mb-xl-5">
                <?= $this->Form->control('original_title', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text'  => __d('movies', 'Original Title')
                    ]
                ]); ?>
            </div>
            <div class="col-12 col-xl-2 mb-15 mb-xl-5">
                <?= $this->Form->control('tmdb_id', [
                    'type'  => 'text',
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text'  => __d('movies', 'TMDB ID')
                    ]
                ]); ?>
            </div>
            <div class="col-12 col-xl-5 mb-xl-5">
                <?= $this->Form->control('status_id', [
                    'type'    => 'select',
                    'options' => $movieStatuses,
                    'class'   => 'text-dark-light form-select',
                    'label'   => [
                        'class' => 'text-gray-600 form-label',
                        'text'  => __d('movies', 'Status'),
                    ],
                    'empty'   => __d('events', '- Select -'),
                ]); ?>
            </div>
            <div class="col-12 col-xl-2 mb-xl-5">
                <?= $this->Form->control('release_date', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text'  => __d('movies', 'Release Date'),
                    ],
                ]); ?>
            </div>
            <div class="col-12 mb-15 mb-xl-5">
                <?= $this->Form->control('overview', [
                    'class' => 'text-dark-light form-control',
                    'label' => [
                        'class' => 'text-gray-600 form-label',
                        'text'  => __d('shows', 'Overview/Description')
                    ]
                ]); ?>
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-xl-6 mb-15 mb-xl-0 pe-5">
                <?= $this->Html->link(
                    '<i class="fas fa-angle-left mb-1"></i>' . __d('buttons', 'Go back'),
                    [
                        'controller' => 'Movies',
                        'action'     => 'index'
                    ],
                    [
                        'class'  => 'btn btn-lg btn-secondary me-3 my-2',
                        'escape' => false
                    ]
                ) ?>
            </div>
            <div class="col-xl-6 mb-15 mb-xl-0 pe-5  text-end">
                <?= $this->Form->postButton(
                    __d('buttons', 'Save'),
                    [
                        'controller' => 'Movies',
                        'action'     => 'new',
                    ],
                    [
                        'class' => 'btn btn-lg btn-primary me-3 my-2',
                        'id'    => 'btn-save-movie'
                    ]
                )
                    ?>
                <a href="javascript:;" class="btn btn-lg btn-primary me-3 my-2 d-none" id="btn-save-user-spinner">
                    <span class="spinner-border spinner-border-sm me-4" role="status" aria-hidden="true"></span>
                    <?= __d('buttons', 'Save'); ?>
                </a>
            </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>