<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Call'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Support Groups'), ['controller' => 'SupportGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Support Group'), ['controller' => 'SupportGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Active Calls'), ['controller' => 'ActiveCalls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Active Call'), ['controller' => 'ActiveCalls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calls index large-9 medium-8 columns content">
    <h3><?= __('Calls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calls as $call): ?>
            <tr>
                <td><?= $this->Number->format($call->id) ?></td>
                <td><?= h($call->name) ?></td>
                <td><?= $this->Number->format($call->type) ?></td>
                <td><?= h($call->description) ?></td>
                <td><?= $this->Number->format($call->priority) ?></td>
                <td><?= $this->Number->format($call->status) ?></td>
                <td><?= h($call->creation_date) ?></td>
                <td><?= h($call->modified_date) ?></td>
                <td><?= $call->has('support_group') ? $this->Html->link($call->support_group->name, ['controller' => 'SupportGroups', 'action' => 'view', $call->support_group->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $call->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $call->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $call->id], ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
