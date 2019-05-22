<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CmsUser $cmsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cms Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cms Groups'), ['controller' => 'CmsGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cms Group'), ['controller' => 'CmsGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mass Export Queue'), ['controller' => 'MassExportQueue', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mass Export Queue'), ['controller' => 'MassExportQueue', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cmsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($cmsUser) ?>
    <fieldset>
        <legend><?= __('Add Cms User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('password_question');
            echo $this->Form->control('password_answer');
            echo $this->Form->control('email');
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('modifiedby');
            echo $this->Form->control('cms_group_id', ['options' => $cmsGroups, 'empty' => true]);
            echo $this->Form->control('reset_key');
            echo $this->Form->control('last_login');
            echo $this->Form->control('default_locale');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
