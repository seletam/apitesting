<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Support Group'), ['action' => 'edit', $supportGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Support Group'), ['action' => 'delete', $supportGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supportGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Support Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Support Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supportGroups view large-9 medium-8 columns content">
    <h3><?= h($supportGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($supportGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($supportGroup->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supportGroup->id) ?></td>
        </tr>
    </table>
</div>
