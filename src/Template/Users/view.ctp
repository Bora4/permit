<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permits'), ['controller' => 'Permits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permit'), ['controller' => 'Permits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($user->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tckn') ?></th>
            <td><?= h($user->tckn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Personnelno') ?></th>
            <td><?= $this->Number->format($user->personnelno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permitleft') ?></th>
            <td><?= $this->Number->format($user->permitleft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permitused') ?></th>
            <td><?= $this->Number->format($user->permitused) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permits') ?></h4>
        <?php if (!empty($user->permits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Startdate') ?></th>
                <th scope="col"><?= __('Enddate') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Visitedcustomer') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->permits as $permits): ?>
            <tr>
                <td><?= h($permits->id) ?></td>
                <td><?= h($permits->startdate) ?></td>
                <td><?= h($permits->enddate) ?></td>
                <td><?= h($permits->reason) ?></td>
                <td><?= h($permits->visitedcustomer) ?></td>
                <td><?= h($permits->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permits', 'action' => 'view', $permits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permits', 'action' => 'edit', $permits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permits', 'action' => 'delete', $permits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
