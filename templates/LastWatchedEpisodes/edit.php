<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LastWatchedEpisode $lastWatchedEpisode
 * @var string[]|\Cake\Collection\CollectionInterface $episodes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lastWatchedEpisode->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lastWatchedEpisode->user_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Last Watched Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lastWatchedEpisodes form content">
            <?= $this->Form->create($lastWatchedEpisode) ?>
            <fieldset>
                <legend><?= __('Edit Last Watched Episode') ?></legend>
                <?php
                    echo $this->Form->control('episode_id', ['options' => $episodes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
