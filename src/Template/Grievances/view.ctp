<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grievance'), ['action' => 'edit', $grievance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grievance'), ['action' => 'delete', $grievance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grievance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grievances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grievance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grievances view large-9 medium-8 columns content">
    <h3><?= h($grievance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $grievance->has('user') ? $this->Html->link($grievance->user->id, ['controller' => 'Users', 'action' => 'view', $grievance->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grievance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Id') ?></th>
            <td><?= $this->Number->format($grievance->location_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($grievance->created_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified Date') ?></th>
            <td><?= h($grievance->modified_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($grievance->description)); ?>
    </div>
</div>
