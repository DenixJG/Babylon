<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeNote $episodeNote
 * @var \Cake\Collection\CollectionInterface|string[] $episodes
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Episode Notes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeNotes form content">
            <?= $this->Form->create($episodeNote) ?>
            <fieldset>
                <legend><?= __('Add Episode Note') ?></legend>
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
