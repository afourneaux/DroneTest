<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $cmsGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cms Group'), ['action' => 'edit', $cmsGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cms Group'), ['action' => 'delete', $cmsGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cmsGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cms Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cms Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cmsGroups view large-9 medium-8 columns content">
    <h3><?= h($cmsGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Group Name') ?></th>
            <td><?= h($cmsGroup->group_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($cmsGroup->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($cmsGroup->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cmsGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cmsGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cmsGroup->modified) ?></td>
        </tr>
    </table>
</div>
