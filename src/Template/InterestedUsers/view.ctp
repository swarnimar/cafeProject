<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\InterestedUser $interestedUser
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Interested User'), ['action' => 'edit', $interestedUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Interested User'), ['action' => 'delete', $interestedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $interestedUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Interested Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Interested User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="interestedUsers view large-9 medium-8 columns content">
    <h3><?= h($interestedUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $interestedUser->has('user') ? $this->Html->link($interestedUser->user->id, ['controller' => 'Users', 'action' => 'view', $interestedUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $interestedUser->has('product') ? $this->Html->link($interestedUser->product->id, ['controller' => 'Products', 'action' => 'view', $interestedUser->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($interestedUser->id) ?></td>
        </tr>
    </table>
</div>
