<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Season'), ['action' => 'edit', $season->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Season'), ['action' => 'delete', $season->id], ['confirm' => __('Are you sure you want to delete # {0}?', $season->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Seasons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Season'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="seasons view content">
            <h3><?= h($season->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Show') ?></th>
                    <td><?= $season->has('show') ? $this->Html->link($season->show->title, ['controller' => 'Shows', 'action' => 'view', $season->show->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($season->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= $this->Number->format($season->number) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Episodes') ?></h4>
                <?php if (!empty($season->episodes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Season Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($season->episodes as $episodes) : ?>
                        <tr>
                            <td><?= h($episodes->id) ?></td>
                            <td><?= h($episodes->number) ?></td>
                            <td><?= h($episodes->title) ?></td>
                            <td><?= h($episodes->season_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Episodes', 'action' => 'view', $episodes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Episodes', 'action' => 'edit', $episodes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Episodes', 'action' => 'delete', $episodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
