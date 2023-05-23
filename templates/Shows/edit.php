<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 * @var string[]|\Cake\Collection\CollectionInterface $showStatuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $show->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $show->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shows form content">
            <?= $this->Form->create($show) ?>
            <fieldset>
                <legend><?= __('Edit Show') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('status_id', ['options' => $showStatuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
