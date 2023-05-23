<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episode $episode
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Episode'), ['action' => 'edit', $episode->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Episode'), ['action' => 'delete', $episode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episode->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Episodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Episode'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="episodes view content">
            <h3><?= h($episode->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($episode->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Season') ?></th>
                    <td><?= $episode->has('season') ? $this->Html->link($episode->season->id, ['controller' => 'Seasons', 'action' => 'view', $episode->season->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($episode->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= $this->Number->format($episode->number) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Episode Notes') ?></h4>
                <?php if (!empty($episode->episode_notes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Episode Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Note') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($episode->episode_notes as $episodeNotes) : ?>
                        <tr>
                            <td><?= h($episodeNotes->id) ?></td>
                            <td><?= h($episodeNotes->episode_id) ?></td>
                            <td><?= h($episodeNotes->user_id) ?></td>
                            <td><?= h($episodeNotes->note) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EpisodeNotes', 'action' => 'view', $episodeNotes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeNotes', 'action' => 'edit', $episodeNotes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeNotes', 'action' => 'delete', $episodeNotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeNotes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Episode User Statuses') ?></h4>
                <?php if (!empty($episode->episode_user_statuses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Episode Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($episode->episode_user_statuses as $episodeUserStatuses) : ?>
                        <tr>
                            <td><?= h($episodeUserStatuses->id) ?></td>
                            <td><?= h($episodeUserStatuses->user_id) ?></td>
                            <td><?= h($episodeUserStatuses->episode_id) ?></td>
                            <td><?= h($episodeUserStatuses->status_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EpisodeUserStatuses', 'action' => 'view', $episodeUserStatuses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EpisodeUserStatuses', 'action' => 'edit', $episodeUserStatuses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EpisodeUserStatuses', 'action' => 'delete', $episodeUserStatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeUserStatuses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Last Watched Episodes') ?></h4>
                <?php if (!empty($episode->last_watched_episodes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Episode Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($episode->last_watched_episodes as $lastWatchedEpisodes) : ?>
                        <tr>
                            <td><?= h($lastWatchedEpisodes->user_id) ?></td>
                            <td><?= h($lastWatchedEpisodes->episode_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'LastWatchedEpisodes', 'action' => 'view', $lastWatchedEpisodes->user_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'LastWatchedEpisodes', 'action' => 'edit', $lastWatchedEpisodes->user_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'LastWatchedEpisodes', 'action' => 'delete', $lastWatchedEpisodes->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $lastWatchedEpisodes->user_id)]) ?>
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
