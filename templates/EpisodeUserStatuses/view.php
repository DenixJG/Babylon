<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeUserStatus $episodeUserStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode User Status'), ['action' => 'edit', $episodeUserStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode User Status'), ['action' => 'delete', $episodeUserStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeUserStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episode User Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode User Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeUserStatuses view content">
            <h3><?= h($episodeUserStatus->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $episodeUserStatus->has('user') ? $this->Html->link($episodeUserStatus->user->id, ['controller' => 'Users', 'action' => 'view', $episodeUserStatus->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= $episodeUserStatus->has('episode') ? $this->Html->link($episodeUserStatus->episode->title, ['controller' => 'Episodes', 'action' => 'view', $episodeUserStatus->episode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Episode Status') ?></th>
                    <td><?= $episodeUserStatus->has('episode_status') ? $this->Html->link($episodeUserStatus->episode_status->name, ['controller' => 'EpisodeStatuses', 'action' => 'view', $episodeUserStatus->episode_status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episodeUserStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
