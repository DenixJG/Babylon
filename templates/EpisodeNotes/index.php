<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EpisodeNote> $episodeNotes
 */
?>
<div class="episodeNotes index content">
    <?= $this->Html->link(__('New Episode Note'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Episode Notes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('episode_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($episodeNotes as $episodeNote): ?>
                <tr>
                    <td><?= $this->Number->format($episodeNote->id) ?></td>
                    <td><?= $episodeNote->has('episode') ? $this->Html->link($episodeNote->episode->title, ['controller' => 'Episodes', 'action' => 'view', $episodeNote->episode->id]) : '' ?></td>
                    <td><?= $episodeNote->has('user') ? $this->Html->link($episodeNote->user->id, ['controller' => 'Users', 'action' => 'view', $episodeNote->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $episodeNote->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodeNote->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodeNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeNote->id)]) ?>
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
