<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\LastWatchedEpisode> $lastWatchedEpisodes
 */
?>
<div class="lastWatchedEpisodes index content">
    <?= $this->Html->link(__('New Last Watched Episode'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Last Watched Episodes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('episode_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lastWatchedEpisodes as $lastWatchedEpisode): ?>
                <tr>
                    <td><?= $this->Number->format($lastWatchedEpisode->user_id) ?></td>
                    <td><?= $lastWatchedEpisode->has('episode') ? $this->Html->link($lastWatchedEpisode->episode->title, ['controller' => 'Episodes', 'action' => 'view', $lastWatchedEpisode->episode->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lastWatchedEpisode->user_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lastWatchedEpisode->user_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lastWatchedEpisode->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $lastWatchedEpisode->user_id)]) ?>
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
