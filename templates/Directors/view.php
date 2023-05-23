<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Director $director
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Director'), ['action' => 'edit', $director->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Director'), ['action' => 'delete', $director->id], ['confirm' => __('Are you sure you want to delete # {0}?', $director->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Directors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Director'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="directors view content">
            <h3><?= h($director->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($director->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($director->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Movie Directors') ?></h4>
                <?php if (!empty($director->movie_directors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Director Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($director->movie_directors as $movieDirectors) : ?>
                        <tr>
                            <td><?= h($movieDirectors->id) ?></td>
                            <td><?= h($movieDirectors->movie_id) ?></td>
                            <td><?= h($movieDirectors->director_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MovieDirectors', 'action' => 'view', $movieDirectors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MovieDirectors', 'action' => 'edit', $movieDirectors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MovieDirectors', 'action' => 'delete', $movieDirectors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieDirectors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Show Directors') ?></h4>
                <?php if (!empty($director->show_directors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Show Id') ?></th>
                            <th><?= __('Director Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($director->show_directors as $showDirectors) : ?>
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
