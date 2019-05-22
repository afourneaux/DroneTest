<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $cmsGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cms Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cmsGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($cmsGroup) ?>
    <fieldset>
        <legend><?= __('Add Cms Group') ?></legend>
        <?php
            echo $this->Form->control('group_name');
            echo $this->Form->control('modifiedby');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
