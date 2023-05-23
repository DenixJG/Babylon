<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LastWatchedEpisode $lastWatchedEpisode
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Last Watched Episode'), ['action' => 'edit', $lastWatchedEpisode->user_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Last Watched Episode'), ['action' => 'delete', $lastWatchedEpisode->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $lastWatchedEpisode->user_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Last Watched Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Last Watched Episode'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lastWatchedEpisodes view content">
            <h3><?= h($lastWatchedEpisode->user_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= $lastWatchedEpisode->has('episode') ? $this->Html->link($lastWatchedEpisode->episode->title, ['controller' => 'Episodes', 'action' => 'view', $lastWatchedEpisode->episode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($lastWatchedEpisode->user_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
