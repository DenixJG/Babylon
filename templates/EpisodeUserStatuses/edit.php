<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeUserStatus $episodeUserStatus
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $episodes
 * @var string[]|\Cake\Collection\CollectionInterface $episodeStatuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $episodeUserStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $episodeUserStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Episode User Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodeUserStatuses form content">
            <?= $this->Form->create($episodeUserStatus) ?>
            <fieldset>
                <legend><?= __('Edit Episode User Status') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('episode_id', ['options' => $episodes]);
                    echo $this->Form->control('status_id', ['options' => $episodeStatuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
