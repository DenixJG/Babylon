<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowStatus $showStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $showStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $showStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Show Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showStatuses form content">
            <?= $this->Form->create($showStatus) ?>
            <fieldset>
                <legend><?= __('Edit Show Status') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
