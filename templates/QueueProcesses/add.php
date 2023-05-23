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
            <?= $this->Html->link(__('List Queue Processes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queueProcesses form content">
            <?= $this->Form->create($queueProcess) ?>
            <fieldset>
                <legend><?= __('Add Queue Process') ?></legend>
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
