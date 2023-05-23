<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowDirector $showDirector
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Show Director'), ['action' => 'edit', $showDirector->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Show Director'), ['action' => 'delete', $showDirector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $showDirector->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Show Directors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Show Director'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showDirectors view content">
            <h3><?= h($showDirector->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Show') ?></th>
                    <td><?= $showDirector->has('show') ? $this->Html->link($showDirector->show->title, ['controller' => 'Shows', 'action' => 'view', $showDirector->show->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Director') ?></th>
                    <td><?= $showDirector->has('director') ? $this->Html->link($showDirector->director->name, ['controller' => 'Directors', 'action' => 'view', $showDirector->director->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($showDirector->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
