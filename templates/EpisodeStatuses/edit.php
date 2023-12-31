<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeStatus $episodeStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episodeStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episodeStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episode Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeStatuses form content">
            <?= $this->Form->create($episodeStatus) ?>
            <fieldset>
                <legend><?= __('Edit Episode Status') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
