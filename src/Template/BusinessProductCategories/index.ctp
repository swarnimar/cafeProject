<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\BusinessProductCategory[]|\Cake\Collection\CollectionInterface $businessProductCategories
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Business Product Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessProductCategories index large-9 medium-8 columns content">
    <h3><?= __('Business Product Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessProductCategories as $businessProductCategory): ?>
            <tr>
                <td><?= $this->Number->format($businessProductCategory->id) ?></td>
                <td><?= $businessProductCategory->has('business') ? $this->Html->link($businessProductCategory->business->name, ['controller' => 'Businesses', 'action' => 'view', $businessProductCategory->business->id]) : '' ?></td>
                <td><?= $businessProductCategory->has('product_category') ? $this->Html->link($businessProductCategory->product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $businessProductCategory->product_category->id]) : '' ?></td>
                <td><?= h($businessProductCategory->created) ?></td>
                <td><?= h($businessProductCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessProductCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessProductCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessProductCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessProductCategory->id)]) ?>
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
