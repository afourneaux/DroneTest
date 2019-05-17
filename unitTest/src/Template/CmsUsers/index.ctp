<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CmsUser[]|\Cake\Collection\CollectionInterface $cmsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cms User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cms Groups'), ['controller' => 'CmsGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cms Group'), ['controller' => 'CmsGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mass Export Queue'), ['controller' => 'MassExportQueue', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mass Export Queue'), ['controller' => 'MassExportQueue', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cmsUsers index large-9 medium-8 columns content">
    <h3><?= __('Cms Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password_question') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password_answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cms_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reset_key') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('default_locale') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cmsUsers as $cmsUser): ?>
            <tr>
                <td><?= $this->Number->format($cmsUser->id) ?></td>
                <td><?= h($cmsUser->username) ?></td>
                <td><?= h($cmsUser->password) ?></td>
                <td><?= h($cmsUser->password_question) ?></td>
                <td><?= h($cmsUser->password_answer) ?></td>
                <td><?= h($cmsUser->email) ?></td>
                <td><?= h($cmsUser->firstname) ?></td>
                <td><?= h($cmsUser->lastname) ?></td>
                <td><?= h($cmsUser->created) ?></td>
                <td><?= h($cmsUser->modified) ?></td>
                <td><?= h($cmsUser->modifiedby) ?></td>
                <td><?= $cmsUser->has('cms_group') ? $this->Html->link($cmsUser->cms_group->id, ['controller' => 'CmsGroups', 'action' => 'view', $cmsUser->cms_group->id]) : '' ?></td>
                <td><?= h($cmsUser->reset_key) ?></td>
                <td><?= h($cmsUser->last_login) ?></td>
                <td><?= $this->Number->format($cmsUser->default_locale) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cmsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cmsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cmsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cmsUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
