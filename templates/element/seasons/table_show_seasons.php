<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season[]|\Cake\Collection\CollectionInterface $seasons
 */
?>
<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5">
        <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <?= $this->Paginator->sort('Seasons.number', __d('shows', 'Number'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Seasons.name', __d('shows', 'Name'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Seasons.episode_count', __d('shows', 'Episodes'), ['escape' => false]); ?>
                <?= $this->Paginator->sort('Seasons.air_date', __d('shows', 'Air Date'), ['escape' => false]); ?>
                <th class="text-end min-w-70px">
                    <?= __d('shows', 'Actions') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($seasons) && !empty($seasons)): ?>
                <?php foreach ($seasons as $season): ?>
                    <tr>
                        <td>
                            <?= $season->number; ?>
                        </td>
                        <td>
                            <?= $season->name ?>
                        </td>
                        <td>
                            <?= $season->episode_count; ?>
                        </td>
                        <td>
                            <?= $this->Time->i18nFormat(
                                $season->air_date,
                                'dd/MM/yyyy',
                                ''
                            ); ?>
                        </td>                        
                        <td class="text-end min-w-70px">
                            <div class="btn-group">
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit"></i>',
                                    [
                                        'controller' => 'Seasons',
                                        'action'     => 'edit', $season->id
                                    ],
                                    [
                                        'class'  => 'btn btn-sm btn-primary',
                                        'escape' => false
                                    ]
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-info"></i>',
                                    'javascript:void(0)',
                                    [
                                        'class'          => 'btn btn-sm btn-info btn-view-season-details',
                                        'data-season-id' => $season->id,
                                        'escape'         => false
                                    ]
                                ); ?>
                                <?= $this->Html->link(
                                    '<i class="fa fa-trash"></i>',
                                    'javascript:void(0)',
                                    [
                                        'class' => 'btn btn-sm btn-danger', 
                                        'data-show-id' => $season->id,
                                        'escape' => false
                                    ]
                                ); ?>                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">
                        <?= __d('shows', 'No seasons found') ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>