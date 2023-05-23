<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Show'), ['action' => 'edit', $show->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Show'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Show'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shows view content">
            <h3><?= h($show->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($show->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Show Status') ?></th>
                    <td><?= $show->has('show_status') ? $this->Html->link($show->show_status->name, ['controller' => 'ShowStatuses', 'action' => 'view', $show->show_status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($show->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Seasons') ?></h4>
                <?php if (!empty($show->seasons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Show Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($show->seasons as $seasons) : ?>
                        <tr>
                            <td><?= h($seasons->id) ?></td>
                            <td><?= h($seasons->number) ?></td>
                            <td><?= h($seasons->show_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Seasons', 'action' => 'view', $seasons->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Seasons', 'action' => 'edit', $seasons->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Seasons', 'action' => 'delete', $seasons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seasons->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Show Directors') ?></h4>
                <?php if (!empty($show->show_directors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Show Id') ?></th>
                            <th><?= __('Director Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($show->show_directors as $showDirectors) : ?>
                        <tr>
                            <td><?= h($showDirectors->id) ?></td>
                            <td><?= h($showDirectors->show_id) ?></td>
                            <td><?= h($showDirectors->director_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ShowDirectors', 'action' => 'view', $showDirectors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ShowDirectors', 'action' => 'edit', $showDirectors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShowDirectors', 'action' => 'delete', $showDirectors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $showDirectors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
