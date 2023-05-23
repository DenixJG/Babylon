<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeNote $episodeNote
 * @var string[]|\Cake\Collection\CollectionInterface $episodes
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episodeNote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episodeNote->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episode Notes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeNotes form content">
            <?= $this->Form->create($episodeNote) ?>
            <fieldset>
                <legend><?= __('Edit Episode Note') ?></legend>
                <?php
                    echo $this->Form->control('episode_id', ['options' => $episodes]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('note');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
