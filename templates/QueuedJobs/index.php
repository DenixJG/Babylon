<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $queuedJobs
 */
?>
<div class="queuedJobs index content">
    <?= $this->Html->link(__('New Queued Job'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Queued Jobs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('job_task') ?></th>
                    <th><?= $this->Paginator->sort('job_group') ?></th>
                    <th><?= $this->Paginator->sort('reference') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('notbefore') ?></th>
                    <th><?= $this->Paginator->sort('fetched') ?></th>
                    <th><?= $this->Paginator->sort('completed') ?></th>
                    <th><?= $this->Paginator->sort('progress') ?></th>
                    <th><?= $this->Paginator->sort('failed') ?></th>
                    <th><?= $this->Paginator->sort('workerkey') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($queuedJobs as $queuedJob): ?>
                <tr>
                    <td><?= $this->Number->format($queuedJob->id) ?></td>
                    <td><?= h($queuedJob->job_task) ?></td>
                    <td><?= h($queuedJob->job_group) ?></td>
                    <td><?= h($queuedJob->reference) ?></td>
                    <td><?= h($queuedJob->created) ?></td>
                    <td><?= h($queuedJob->notbefore) ?></td>
                    <td><?= h($queuedJob->fetched) ?></td>
                    <td><?= h($queuedJob->completed) ?></td>
                    <td><?= $queuedJob->progress === null ? '' : $this->Number->format($queuedJob->progress) ?></td>
                    <td><?= $this->Number->format($queuedJob->failed) ?></td>
                    <td><?= h($queuedJob->workerkey) ?></td>
                    <td><?= h($queuedJob->status) ?></td>
                    <td><?= $this->Number->format($queuedJob->priority) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $queuedJob->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $queuedJob->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $queuedJob->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queuedJob->id)]) ?>
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
