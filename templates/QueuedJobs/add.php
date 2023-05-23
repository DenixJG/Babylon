<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $queuedJob
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Queued Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queuedJobs form content">
            <?= $this->Form->create($queuedJob) ?>
            <fieldset>
                <legend><?= __('Add Queued Job') ?></legend>
                <?php
                    echo $this->Form->control('job_task');
                    echo $this->Form->control('data');
                    echo $this->Form->control('job_group');
                    echo $this->Form->control('reference');
                    echo $this->Form->control('notbefore', ['empty' => true]);
                    echo $this->Form->control('fetched', ['empty' => true]);
                    echo $this->Form->control('completed', ['empty' => true]);
                    echo $this->Form->control('progress');
                    echo $this->Form->control('failed');
                    echo $this->Form->control('failure_message');
                    echo $this->Form->control('workerkey');
                    echo $this->Form->control('status');
                    echo $this->Form->control('priority');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
