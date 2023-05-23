<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Movie'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movies view content">
            <h3><?= h($movie->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($movie->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Movie Status') ?></th>
                    <td><?= $movie->has('movie_status') ? $this->Html->link($movie->movie_status->name, ['controller' => 'MovieStatuses', 'action' => 'view', $movie->movie_status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movie->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Date') ?></th>
                    <td><?= h($movie->release_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Movie Directors') ?></h4>
                <?php if (!empty($movie->movie_directors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Director Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($movie->movie_directors as $movieDirectors) : ?>
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
        </div>
    </div>
</div>
