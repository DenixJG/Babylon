<?php

/**
 * @var \App\View\AppView $this 
 */

$this->Breadcrumbs->add(__d('movies', 'APIs'), null, ['class' => 'breadcrumb-item text-muted']);
$this->Breadcrumbs->add(__d('movies', 'TMDB'), null, ['class' => 'breadcrumb-item text-dark']);
?>

<?= $this->Html->script('apis/tmdb.js', ['block' => 'custom-scripts']) ?>

<!--begin::Card-->
<div class="card mb-7">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Compact form-->
        <div class="d-flex align-items-center">
            <!--begin::Input group-->
            <div class="position-relative w-100 me-md-2">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <?= $this->Svg->getSvgIcon('icons/duotune/general/gen021.svg', 'svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6') ?>
                <!--end::Svg Icon-->
                <?= $this->Form->control('search', [
                    'type' => 'text',
                    'class' => 'form-control form-control-solid ps-10',
                    'id' => 'search-input',
                    'placeholder' => __d('tmdb', 'Search'),
                    'label' => false,
                    'value' => (isset($search_term)) ? $search_term : ''
                ]); ?>
            </div>
            <!--end::Input group-->
            <div class="d-flex align-items-center">
                <?= $this->Form->postButton(__d('tmdb', 'Search'), '/tmdb/search', [
                    'escape' => false,
                    'class' => 'btn btn-primary me-5',
                    'id' => 'btn-search'
                ]); ?>
            </div>
        </div>
        <!--end::Compact form-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

<div class="tab-content">
    <!--begin::Tab pane-->
    <div id="kt_project_users_card_pane" class="tab-pane fade show active">
        <!--begin::Row-->
        <div class="row g-6 g-xl-9">
            <?php if (isset($tmdb_result['results']) && !empty($tmdb_result['results'])): ?>
                <?php foreach ($tmdb_result['results'] as $key => $result): ?>
                    <!--begin::Col-->
                    <div class="col-md-6 col-xxl-4">
                        <?= $this->element('tmdb/result_card', ['result' => $result]) ?>
                    </div>
                    <!--end::Col-->
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!--end::Row-->
        <?php if (isset($search_term)): ?>
            <!--begin::Pagination-->
            <div class="d-flex flex-stack flex-wrap pt-10">
                <div class="fs-6 fw-bold text-gray-700">Showing 1 to 20 of <?= $tmdb_result['total_results'] ?> entries</div>                
                <ul class="pagination">                    
                    <li class="page-item previous">
                        <a href="#" class="page-link">
                            <i class="previous"></i>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">6</a>
                    </li>
                    <li class="page-item next">
                        <a href="#" class="page-link">
                            <i class="next"></i>
                        </a>
                    </li>
                </ul>
                <!--end::Pages-->
            </div>
            <!--end::Pagination-->
        <?php endif; ?>
    </div>
    <!--end::Tab pane-->
</div>