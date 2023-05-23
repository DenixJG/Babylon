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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movieStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movieStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Movie Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movieStatuses form content">
            <?= $this->Form->create($movieStatus) ?>
            <fieldset>
                <legend><?= __('Edit Movie Status') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
