<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeNote $episodeNote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode Note'), ['action' => 'edit', $episodeNote->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode Note'), ['action' => 'delete', $episodeNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeNote->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episode Notes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode Note'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeNotes view content">
            <h3><?= h($episodeNote->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= $episodeNote->has('episode') ? $this->Html->link($episodeNote->episode->title, ['controller' => 'Episodes', 'action' => 'view', $episodeNote->episode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $episodeNote->has('user') ? $this->Html->link($episodeNote->user->id, ['controller' => 'Users', 'action' => 'view', $episodeNote->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episodeNote->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($episodeNote->note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
