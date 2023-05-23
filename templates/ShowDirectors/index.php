<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ShowDirector> $showDirectors
 */
?>
<div class="showDirectors index content">
    <?= $this->Html->link(__('New Show Director'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Show Directors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('show_id') ?></th>
                    <th><?= $this->Paginator->sort('director_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showDirectors as $showDirector): ?>
                <tr>
                    <td><?= $this->Number->format($showDirector->id) ?></td>
                    <td><?= $showDirector->has('show') ? $this->Html->link($showDirector->show->title, ['controller' => 'Shows', 'action' => 'view', $showDirector->show->id]) : '' ?></td>
                    <td><?= $showDirector->has('director') ? $this->Html->link($showDirector->director->name, ['controller' => 'Directors', 'action' => 'view', $showDirector->director->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $showDirector->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $showDirector->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $showDirector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $showDirector->id)]) ?>
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
