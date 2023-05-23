<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $queueProcess
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $queueProcess->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $queueProcess->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Queue Processes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queueProcesses form content">
            <?= $this->Form->create($queueProcess) ?>
            <fieldset>
                <legend><?= __('Edit Queue Process') ?></legend>
                <?php
                    echo $this->Form->control('pid');
                    echo $this->Form->control('terminate');
                    echo $this->Form->control('server');
                    echo $this->Form->control('workerkey');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
