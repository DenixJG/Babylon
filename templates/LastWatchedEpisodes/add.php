<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LastWatchedEpisode $lastWatchedEpisode
 * @var \Cake\Collection\CollectionInterface|string[] $episodes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Last Watched Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lastWatchedEpisodes form content">
            <?= $this->Form->create($lastWatchedEpisode) ?>
            <fieldset>
                <legend><?= __('Add Last Watched Episode') ?></legend>
                <?php
                    echo $this->Form->control('episode_id', ['options' => $episodes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
