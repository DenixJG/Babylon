<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EpisodeUserStatus> $episodeUserStatuses
 */
?>
<div class="episodeUserStatuses index content">
    <?= $this->Html->link(__('New Episode User Status'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Episode User Statuses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('episode_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($episodeUserStatuses as $episodeUserStatus): ?>
                <tr>
                    <td><?= $this->Number->format($episodeUserStatus->id) ?></td>
                    <td><?= $episodeUserStatus->has('user') ? $this->Html->link($episodeUserStatus->user->id, ['controller' => 'Users', 'action' => 'view', $episodeUserStatus->user->id]) : '' ?></td>
                    <td><?= $episodeUserStatus->has('episode') ? $this->Html->link($episodeUserStatus->episode->title, ['controller' => 'Episodes', 'action' => 'view', $episodeUserStatus->episode->id]) : '' ?></td>
                    <td><?= $episodeUserStatus->has('episode_status') ? $this->Html->link($episodeUserStatus->episode_status->name, ['controller' => 'EpisodeStatuses', 'action' => 'view', $episodeUserStatus->episode_status->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $episodeUserStatus->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodeUserStatus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodeUserStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeUserStatus->id)]) ?>
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
