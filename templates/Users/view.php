<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Episode Notes') ?></h4>
                <?php if (!empty($user->episode_notes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Episode Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Note') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->episode_notes as $episodeNotes) : ?>
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
                <?php if (!empty($user->episode_user_statuses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Episode Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->episode_user_statuses as $episodeUserStatuses) : ?>
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
                <?php if (!empty($user->last_watched_episodes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Episode Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->last_watched_episodes as $lastWatchedEpisodes) : ?>
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
            <div class="related">
                <h4><?= __('Related Notes') ?></h4>
                <?php if (!empty($user->notes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Note') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->notes as $notes) : ?>
                        <tr>
                            <td><?= h($notes->id) ?></td>
                            <td><?= h($notes->type) ?></td>
                            <td><?= h($notes->item_id) ?></td>
                            <td><?= h($notes->user_id) ?></td>
                            <td><?= h($notes->note) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Notes', 'action' => 'view', $notes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'action' => 'edit', $notes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'action' => 'delete', $notes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notes->id)]) ?>
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
