<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permit $permit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permit'), ['action' => 'edit', $permit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permit'), ['action' => 'delete', $permit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permits view large-9 medium-8 columns content">
    <h3><?= h($permit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reason') ?></th>
            <td><?= h($permit->reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visitedcustomer') ?></th>
            <td><?= h($permit->visitedcustomer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $permit->has('user') ? $this->Html->link($permit->user->name, ['controller' => 'Users', 'action' => 'view', $permit->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Startdate') ?></th>
            <td><?= h($permit->startdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enddate') ?></th>
            <td><?= h($permit->enddate) ?></td>
        </tr>
    </table>
</div>
