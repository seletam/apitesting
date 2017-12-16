<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Support Groups'), ['controller' => 'SupportGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Support Group'), ['controller' => 'SupportGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Active Calls'), ['controller' => 'ActiveCalls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Active Call'), ['controller' => 'ActiveCalls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calls form large-9 medium-8 columns content">
    <?= $this->Form->create($call) ?>
    <fieldset>
        <legend><?= __('Add Call') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('description');
            echo $this->Form->control('priority');
            echo $this->Form->control('status');
            echo $this->Form->control('creation_date');
            echo $this->Form->control('modified_date');
            echo $this->Form->control('group_id', ['options' => $supportGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
