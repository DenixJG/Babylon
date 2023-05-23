<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Show> $shows
 */
?>
<div class="shows index content">
    <?= $this->Html->link(__('New Show'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Shows') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shows as $show): ?>
                <tr>
                    <td><?= $this->Number->format($show->id) ?></td>
                    <td><?= h($show->title) ?></td>
                    <td><?= $show->has('show_status') ? $this->Html->link($show->show_status->name, ['controller' => 'ShowStatuses', 'action' => 'view', $show->show_status->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $show->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $show->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?>
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
