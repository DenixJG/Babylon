<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episode $episode
 * @var \Cake\Collection\CollectionInterface|string[] $seasons
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodes form content">
            <?= $this->Form->create($episode) ?>
            <fieldset>
                <legend><?= __('Add Episode') ?></legend>
                <?php
                    echo $this->Form->control('number');
                    echo $this->Form->control('title');
                    echo $this->Form->control('season_id', ['options' => $seasons]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
