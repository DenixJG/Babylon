<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MovieDirector> $movieDirectors
 */
?>
<div class="movieDirectors index content">
    <?= $this->Html->link(__('New Movie Director'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Movie Directors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('movie_id') ?></th>
                    <th><?= $this->Paginator->sort('director_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movieDirectors as $movieDirector): ?>
                <tr>
                    <td><?= $this->Number->format($movieDirector->id) ?></td>
                    <td><?= $movieDirector->has('movie') ? $this->Html->link($movieDirector->movie->title, ['controller' => 'Movies', 'action' => 'view', $movieDirector->movie->id]) : '' ?></td>
                    <td><?= $movieDirector->has('director') ? $this->Html->link($movieDirector->director->name, ['controller' => 'Directors', 'action' => 'view', $movieDirector->director->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $movieDirector->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movieDirector->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movieDirector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieDirector->id)]) ?>
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
