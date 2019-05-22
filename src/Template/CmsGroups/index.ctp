<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $cmsGroups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cms Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cmsGroups index large-9 medium-8 columns content">
    <h3><?= __('Cms Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cmsGroups as $cmsGroup): ?>
            <tr>
                <td><?= $this->Number->format($cmsGroup->id) ?></td>
                <td><?= h($cmsGroup->group_name) ?></td>
                <td><?= h($cmsGroup->created) ?></td>
                <td><?= h($cmsGroup->modified) ?></td>
                <td><?= h($cmsGroup->modifiedby) ?></td>
                <td><?= h($cmsGroup->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cmsGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cmsGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cmsGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cmsGroup->id)]) ?>
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
