<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeStatus $episodeStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode Status'), ['action' => 'edit', $episodeStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode Status'), ['action' => 'delete', $episodeStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episode Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeStatuses view content">
            <h3><?= h($episodeStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($episodeStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episodeStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
