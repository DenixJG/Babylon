<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $queueProcess
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Queue Process'), ['action' => 'edit', $queueProcess->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Queue Process'), ['action' => 'delete', $queueProcess->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueProcess->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Queue Processes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Queue Process'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queueProcesses view content">
            <h3><?= h($queueProcess->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pid') ?></th>
                    <td><?= h($queueProcess->pid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Server') ?></th>
                    <td><?= h($queueProcess->server) ?></td>
                </tr>
                <tr>
                    <th><?= __('Workerkey') ?></th>
                    <td><?= h($queueProcess->workerkey) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($queueProcess->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($queueProcess->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($queueProcess->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Terminate') ?></th>
                    <td><?= $queueProcess->terminate ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
