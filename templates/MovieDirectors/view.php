<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieDirector $movieDirector
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Movie Director'), ['action' => 'edit', $movieDirector->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Movie Director'), ['action' => 'delete', $movieDirector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieDirector->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Movie Directors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Movie Director'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movieDirectors view content">
            <h3><?= h($movieDirector->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Movie') ?></th>
                    <td><?= $movieDirector->has('movie') ? $this->Html->link($movieDirector->movie->title, ['controller' => 'Movies', 'action' => 'view', $movieDirector->movie->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Director') ?></th>
                    <td><?= $movieDirector->has('director') ? $this->Html->link($movieDirector->director->name, ['controller' => 'Directors', 'action' => 'view', $movieDirector->director->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movieDirector->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
