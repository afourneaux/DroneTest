<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $massExportQueue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mass Export Queue'), ['action' => 'edit', $massExportQueue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mass Export Queue'), ['action' => 'delete', $massExportQueue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $massExportQueue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mass Export Queue'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mass Export Queue'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="massExportQueue view large-9 medium-8 columns content">
    <h3><?= h($massExportQueue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('File Name') ?></th>
            <td><?= h($massExportQueue->file_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result Msg') ?></th>
            <td><?= h($massExportQueue->result_msg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($massExportQueue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cms User Id') ?></th>
            <td><?= $this->Number->format($massExportQueue->cms_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Queued') ?></th>
            <td><?= $this->Number->format($massExportQueue->queued) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $this->Number->format($massExportQueue->processed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Export Error') ?></th>
            <td><?= $this->Number->format($massExportQueue->export_error) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Rows') ?></th>
            <td><?= $this->Number->format($massExportQueue->number_of_rows) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pid') ?></th>
            <td><?= $this->Number->format($massExportQueue->pid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Sent') ?></th>
            <td><?= h($massExportQueue->email_sent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($massExportQueue->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Sql') ?></h4>
        <?= $this->Text->autoParagraph(h($massExportQueue->sql)); ?>
    </div>
    <div class="row">
        <h4><?= __('Params') ?></h4>
        <?= $this->Text->autoParagraph(h($massExportQueue->params)); ?>
    </div>
</div>
