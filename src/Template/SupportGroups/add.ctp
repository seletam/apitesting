<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Support Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="supportGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($supportGroup) ?>
    <fieldset>
        <legend><?= __('Add Support Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
