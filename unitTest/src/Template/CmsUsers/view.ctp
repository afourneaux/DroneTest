<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CmsUser $cmsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cms User'), ['action' => 'edit', $cmsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cms User'), ['action' => 'delete', $cmsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cmsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cms Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cms User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cms Groups'), ['controller' => 'CmsGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cms Group'), ['controller' => 'CmsGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mass Export Queue'), ['controller' => 'MassExportQueue', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mass Export Queue'), ['controller' => 'MassExportQueue', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cmsUsers view large-9 medium-8 columns content">
    <h3><?= h($cmsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($cmsUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($cmsUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Question') ?></th>
            <td><?= h($cmsUser->password_question) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Answer') ?></th>
            <td><?= h($cmsUser->password_answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cmsUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($cmsUser->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($cmsUser->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($cmsUser->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cms Group') ?></th>
            <td><?= $cmsUser->has('cms_group') ? $this->Html->link($cmsUser->cms_group->id, ['controller' => 'CmsGroups', 'action' => 'view', $cmsUser->cms_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reset Key') ?></th>
            <td><?= h($cmsUser->reset_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cmsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default Locale') ?></th>
            <td><?= $this->Number->format($cmsUser->default_locale) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cmsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cmsUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($cmsUser->last_login) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Mass Export Queue') ?></h4>
        <?php if (!empty($cmsUser->mass_export_queue)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cms User Id') ?></th>
                <th scope="col"><?= __('Sql') ?></th>
                <th scope="col"><?= __('Params') ?></th>
                <th scope="col"><?= __('File Name') ?></th>
                <th scope="col"><?= __('Queued') ?></th>
                <th scope="col"><?= __('Email Sent') ?></th>
                <th scope="col"><?= __('Result Msg') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Export Error') ?></th>
                <th scope="col"><?= __('Number Of Rows') ?></th>
                <th scope="col"><?= __('Pid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cmsUser->mass_export_queue as $massExportQueue): ?>
            <tr>
                <td><?= h($massExportQueue->id) ?></td>
                <td><?= h($massExportQueue->cms_user_id) ?></td>
                <td><?= h($massExportQueue->sql) ?></td>
                <td><?= h($massExportQueue->params) ?></td>
                <td><?= h($massExportQueue->file_name) ?></td>
                <td><?= h($massExportQueue->queued) ?></td>
                <td><?= h($massExportQueue->email_sent) ?></td>
                <td><?= h($massExportQueue->result_msg) ?></td>
                <td><?= h($massExportQueue->created) ?></td>
                <td><?= h($massExportQueue->processed) ?></td>
                <td><?= h($massExportQueue->export_error) ?></td>
                <td><?= h($massExportQueue->number_of_rows) ?></td>
                <td><?= h($massExportQueue->pid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MassExportQueue', 'action' => 'view', $massExportQueue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MassExportQueue', 'action' => 'edit', $massExportQueue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MassExportQueue', 'action' => 'delete', $massExportQueue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $massExportQueue->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
