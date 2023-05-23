<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieStatus $movieStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Movie Status'), ['action' => 'edit', $movieStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Movie Status'), ['action' => 'delete', $movieStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Movie Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Movie Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movieStatuses view content">
            <h3><?= h($movieStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($movieStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movieStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
