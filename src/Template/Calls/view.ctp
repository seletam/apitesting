<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Call'), ['action' => 'edit', $call->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Call'), ['action' => 'delete', $call->id], ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Call'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Support Groups'), ['controller' => 'SupportGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Support Group'), ['controller' => 'SupportGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Active Calls'), ['controller' => 'ActiveCalls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Active Call'), ['controller' => 'ActiveCalls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calls view large-9 medium-8 columns content">
    <h3><?= h($call->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($call->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($call->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Support Group') ?></th>
            <td><?= $call->has('support_group') ? $this->Html->link($call->support_group->name, ['controller' => 'SupportGroups', 'action' => 'view', $call->support_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($call->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($call->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $this->Number->format($call->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($call->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creation Date') ?></th>
            <td><?= h($call->creation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified Date') ?></th>
            <td><?= h($call->modified_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Active Calls') ?></h4>
        <?php if (!empty($call->active_calls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Call Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($call->active_calls as $activeCalls): ?>
            <tr>
                <td><?= h($activeCalls->call_id) ?></td>
                <td><?= h($activeCalls->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ActiveCalls', 'action' => 'view', $activeCalls->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ActiveCalls', 'action' => 'edit', $activeCalls->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ActiveCalls', 'action' => 'delete', $activeCalls->], ['confirm' => __('Are you sure you want to delete # {0}?', $activeCalls->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
