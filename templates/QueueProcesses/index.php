<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $queueProcesses
 */
?>
<div class="queueProcesses index content">
    <?= $this->Html->link(__('New Queue Process'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Queue Processes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pid') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('terminate') ?></th>
                    <th><?= $this->Paginator->sort('server') ?></th>
                    <th><?= $this->Paginator->sort('workerkey') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($queueProcesses as $queueProcess): ?>
                <tr>
                    <td><?= $this->Number->format($queueProcess->id) ?></td>
                    <td><?= h($queueProcess->pid) ?></td>
                    <td><?= h($queueProcess->created) ?></td>
                    <td><?= h($queueProcess->modified) ?></td>
                    <td><?= h($queueProcess->terminate) ?></td>
                    <td><?= h($queueProcess->server) ?></td>
                    <td><?= h($queueProcess->workerkey) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $queueProcess->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $queueProcess->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $queueProcess->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueProcess->id)]) ?>
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
