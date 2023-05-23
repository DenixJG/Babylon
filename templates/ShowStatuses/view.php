<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowStatus $showStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Show Status'), ['action' => 'edit', $showStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Show Status'), ['action' => 'delete', $showStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $showStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Show Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Show Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showStatuses view content">
            <h3><?= h($showStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($showStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($showStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
