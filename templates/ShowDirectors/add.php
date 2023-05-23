<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowDirector $showDirector
 * @var \Cake\Collection\CollectionInterface|string[] $shows
 * @var \Cake\Collection\CollectionInterface|string[] $directors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Show Directors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showDirectors form content">
            <?= $this->Form->create($showDirector) ?>
            <fieldset>
                <legend><?= __('Add Show Director') ?></legend>
                <?php
                    echo $this->Form->control('show_id', ['options' => $shows]);
                    echo $this->Form->control('director_id', ['options' => $directors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
