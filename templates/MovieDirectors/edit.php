<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieDirector $movieDirector
 * @var string[]|\Cake\Collection\CollectionInterface $movies
 * @var string[]|\Cake\Collection\CollectionInterface $directors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movieDirector->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movieDirector->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Movie Directors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movieDirectors form content">
            <?= $this->Form->create($movieDirector) ?>
            <fieldset>
                <legend><?= __('Edit Movie Director') ?></legend>
                <?php
                    echo $this->Form->control('movie_id', ['options' => $movies]);
                    echo $this->Form->control('director_id', ['options' => $directors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
