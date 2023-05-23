<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Episode> $episodes
 */
?>
<div class="episodes index content">
    <?= $this->Html->link(__('New Episode'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Episodes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('season_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($episodes as $episode): ?>
                <tr>
                    <td><?= $this->Number->format($episode->id) ?></td>
                    <td><?= $this->Number->format($episode->number) ?></td>
                    <td><?= h($episode->title) ?></td>
                    <td><?= $episode->has('season') ? $this->Html->link($episode->season->id, ['controller' => 'Seasons', 'action' => 'view', $episode->season->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $episode->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episode->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episode->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
