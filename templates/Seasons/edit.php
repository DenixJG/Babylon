<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 * @var string[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $season->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $season->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Seasons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="seasons form content">
            <?= $this->Form->create($season) ?>
            <fieldset>
                <legend><?= __('Edit Season') ?></legend>
                <?php
                    echo $this->Form->control('number');
                    echo $this->Form->control('show_id', ['options' => $shows]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
