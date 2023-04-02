<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permit[]|\Cake\Collection\CollectionInterface $permits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permits index large-9 medium-8 columns content">
    <h3><?= __('Permits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('startdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enddate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visitedcustomer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permits as $permit): ?>
            <tr>
                <td><?= $this->Number->format($permit->id) ?></td>
                <td><?= h($permit->startdate) ?></td>
                <td><?= h($permit->enddate) ?></td>
                <td><?= h($permit->reason) ?></td>
                <td><?= h($permit->visitedcustomer) ?></td>
                <td><?= $permit->has('user') ? $this->Html->link($permit->user->name, ['controller' => 'Users', 'action' => 'view', $permit->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permit->id)]) ?>
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
