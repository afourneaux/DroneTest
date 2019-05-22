<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $massExportQueue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mass Export Queue'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="massExportQueue index large-9 medium-8 columns content">
    <h3><?= __('Mass Export Queue') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cms_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('queued') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_sent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result_msg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('export_error') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_rows') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($massExportQueue as $massExportQueue): ?>
            <tr>
                <td><?= $this->Number->format($massExportQueue->id) ?></td>
                <td><?= $this->Number->format($massExportQueue->cms_user_id) ?></td>
                <td><?= h($massExportQueue->file_name) ?></td>
                <td><?= $this->Number->format($massExportQueue->queued) ?></td>
                <td><?= h($massExportQueue->email_sent) ?></td>
                <td><?= h($massExportQueue->result_msg) ?></td>
                <td><?= h($massExportQueue->created) ?></td>
                <td><?= $this->Number->format($massExportQueue->processed) ?></td>
                <td><?= $this->Number->format($massExportQueue->export_error) ?></td>
                <td><?= $this->Number->format($massExportQueue->number_of_rows) ?></td>
                <td><?= $this->Number->format($massExportQueue->pid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $massExportQueue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $massExportQueue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $massExportQueue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $massExportQueue->id)]) ?>
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
