<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $call->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]
            )
        ?></li>
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
        <legend><?= __('Edit Call') ?></legend>
        <?php
			$status = ['0' => 'Open call', '1' => 'Resolved'];
			$priority = ['0' => 'High', '1' => 'Medium', '1' => 'Low'];
			//$support = array_combine($supportGroups, $supportGroups);
			echo $this->Form->control('supportGroups', ['options' => $supportGroups]);
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('description');
            echo $this->Form->input('priority', ['options'=> $priority]);
            echo $this->Form->input('Model.name', ['options'=> $status]);
            echo $this->Form->hidden('creation_date');
            echo $this->Form->hidden('modified_date');
            echo $this->Form->control('group_id', ['options' => $supportGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
