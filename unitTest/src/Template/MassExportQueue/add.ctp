<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $massExportQueue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mass Export Queue'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="massExportQueue form large-9 medium-8 columns content">
    <?= $this->Form->create($massExportQueue) ?>
    <fieldset>
        <legend><?= __('Add Mass Export Queue') ?></legend>
        <?php
            echo $this->Form->control('cms_user_id');
            echo $this->Form->control('sql');
            echo $this->Form->control('params');
            echo $this->Form->control('file_name');
            echo $this->Form->control('queued');
            echo $this->Form->control('email_sent');
            echo $this->Form->control('result_msg');
            echo $this->Form->control('processed');
            echo $this->Form->control('export_error');
            echo $this->Form->control('number_of_rows');
            echo $this->Form->control('pid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
