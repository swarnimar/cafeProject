<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\InterestedUser[]|\Cake\Collection\CollectionInterface $interestedUsers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Interested User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="interestedUsers index large-9 medium-8 columns content">
    <h3><?= __('Interested Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($interestedUsers as $interestedUser): ?>
            <tr>
                <td><?= $this->Number->format($interestedUser->id) ?></td>
                <td><?= $interestedUser->has('user') ? $this->Html->link($interestedUser->user->id, ['controller' => 'Users', 'action' => 'view', $interestedUser->user->id]) : '' ?></td>
                <td><?= $interestedUser->has('product') ? $this->Html->link($interestedUser->product->id, ['controller' => 'Products', 'action' => 'view', $interestedUser->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $interestedUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $interestedUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $interestedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $interestedUser->id)]) ?>
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
