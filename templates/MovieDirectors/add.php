<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieDirector $movieDirector
 * @var \Cake\Collection\CollectionInterface|string[] $movies
 * @var \Cake\Collection\CollectionInterface|string[] $directors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Movie Directors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movieDirectors form content">
            <?= $this->Form->create($movieDirector) ?>
            <fieldset>
                <legend><?= __('Add Movie Director') ?></legend>
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
