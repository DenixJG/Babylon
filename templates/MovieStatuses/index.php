<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MovieStatus> $movieStatuses
 */
?>
<div class="movieStatuses index content">
    <?= $this->Html->link(__('New Movie Status'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Movie Statuses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movieStatuses as $movieStatus): ?>
                <tr>
                    <td><?= $this->Number->format($movieStatus->id) ?></td>
                    <td><?= h($movieStatus->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $movieStatus->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movieStatus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movieStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieStatus->id)]) ?>
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
