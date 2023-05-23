<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $queuedJob
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Queued Job'), ['action' => 'edit', $queuedJob->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Queued Job'), ['action' => 'delete', $queuedJob->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queuedJob->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Queued Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Queued Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queuedJobs view content">
            <h3><?= h($queuedJob->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Job Task') ?></th>
                    <td><?= h($queuedJob->job_task) ?></td>
                </tr>
                <tr>
                    <th><?= __('Job Group') ?></th>
                    <td><?= h($queuedJob->job_group) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reference') ?></th>
                    <td><?= h($queuedJob->reference) ?></td>
                </tr>
                <tr>
                    <th><?= __('Workerkey') ?></th>
                    <td><?= h($queuedJob->workerkey) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($queuedJob->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($queuedJob->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Progress') ?></th>
                    <td><?= $queuedJob->progress === null ? '' : $this->Number->format($queuedJob->progress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Failed') ?></th>
                    <td><?= $this->Number->format($queuedJob->failed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Priority') ?></th>
                    <td><?= $this->Number->format($queuedJob->priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($queuedJob->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notbefore') ?></th>
                    <td><?= h($queuedJob->notbefore) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fetched') ?></th>
                    <td><?= h($queuedJob->fetched) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completed') ?></th>
                    <td><?= h($queuedJob->completed) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Data') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($queuedJob->data)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Failure Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($queuedJob->failure_message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
