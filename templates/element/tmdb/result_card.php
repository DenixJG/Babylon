<?php
/**
 * @var App\View\AppView $this The View instance being used
 * @var stdClass $result The result object
 */
?>
<!--begin::Card-->
<div class="card card-stretch">
    <div class="card-header justify-content-end ribbon ribbon-start">
        <?php if (isset($result->media_type) && !empty($result->media_type)): ?>
            <?php if (strtolower($result->media_type) === 'movie'): ?>
                <div class="ribbon-label bg-primary">
                    <?= ucfirst(strtolower($result->media_type)); ?>
                </div>
            <?php elseif (strtolower($result->media_type) === 'tv'): ?>
                <div class="ribbon-label bg-info">
                    <?= ucfirst(strtolower($result->media_type)); ?>
                </div>
            <?php elseif (strtolower($result->media_type) === 'person'): ?>
                <div class="ribbon-label bg-danger">
                    <?= ucfirst(strtolower($result->media_type)); ?>
                </div>
            <?php else: ?>
                <div class=" ribbon-label bg-success">
                    <?= ucfirst(strtolower($result->media_type)); ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>
        <div class="card-title">
            <?= $this->Form->button(__d('tmdb', 'Add to Library'), [
                'type' => 'button',
                'data-tmdb-id' => $result->id,
                'class' => 'btn btn-sm btn-light btn-add-to-library',
                'data-action' => 'add-to-library',
            ]) ?>            
        </div>
    </div>
    <!--begin::Card body-->
    <div class="card-body d-flex flex-center flex-column p-8">
        <!--begin::Avatar-->
        <div class="text-center px-4">
            <?php if (isset($result->profile_url)): ?>
                <img class="mw-100 mh-300px card-rounded-bottom" src="<?= $result->profile_url ?? '#' ?>" alt="image">
            <?php else: ?>
                <img class="mw-100 mh-300px card-rounded-bottom" src="<?= $result->poster_url ?? '#' ?>" alt="image">
            <?php endif; ?>
        </div>
        <!--end::Avatar-->
        <!--begin::Name-->
        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-boldest mb-1 mt-2">
            <?php if (isset($result->original_title)): ?>
                <?= $result->original_title; ?>
            <?php else: ?>
                <?= $result->original_name ?? 'Empty Original Name'; ?>
            <?php endif; ?>
        </a>
        <!--end::Name-->
        <!--begin::Position-->
        <div class="fs-5 fw-bold text-gray-400 mb-6">
            <?= $this->Text->toList($result->genre_ids ?? [], 'and'); ?>
        </div>
        <!--end::Position-->
        <!--begin::Info-->
        <div class="d-flex flex-wrap flex-center mb-8">
            <?php if (isset($result->release_date) && !empty($result->release_date)): ?>
                <!--begin::Stats-->
                <div class="border border-dashed rounded min-w-75px py-3 px-4 mx-2 mb-3">
                    <div class="fs-6 fw-boldest text-gray-700">
                        <?= $result->release_date; ?>
                    </div>
                    <div class="fw-bold text-gray-400">
                        <?= __d('tmdb', 'Release'); ?>
                    </div>
                </div>
                <!--end::Stats-->
                
            <?php elseif (isset($result->first_air_date) && !empty($result->first_air_date)): ?>
                <!--begin::Stats-->
                <div class="border border-dashed rounded min-w-75px py-3 px-4 mx-2 mb-3">
                    <div class="fs-6 fw-boldest text-gray-700">
                        <?= $result->first_air_date; ?>
                    </div>
                    <div class="fw-bold text-gray-400">
                        <?= __d('tmdb', 'Release'); ?>
                    </div>
                </div>
                <!--end::Stats-->
            <?php endif; ?>

            <?php if (isset($result->popularity) && !empty($result->popularity)): ?>
                <!--begin::Stats-->
                <div class="border border-dashed rounded min-w-75px py-3 px-4 mx-2 mb-3">
                    <div class="fs-6 fw-boldest text-gray-700">
                        <?= $result->popularity; ?>
                    </div>
                    <div class="fw-bold text-gray-400">
                        <?= __d('tmdb', 'Popularity'); ?>
                    </div>
                </div>
                <!--end::Stats-->
            <?php endif; ?>

            <?php if (isset($result->vote_average) && !empty($result->vote_average)): ?>
                <!--begin::Stats-->
                <div class="border border-dashed rounded min-w-75px py-3 px-4 mx-2 mb-3">
                    <div class="fs-6 fw-boldest text-gray-700">
                        <?= $result->vote_average; ?>
                    </div>
                    <div class="fw-bold text-gray-400">
                        <?= __d('tmdb', 'Votes'); ?>
                    </div>
                </div>
                <!--end::Stats-->
            <?php endif; ?>
        </div>
        <!--end::Info-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->