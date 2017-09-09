<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\BusinessProductCategory $businessProductCategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business Product Category'), ['action' => 'edit', $businessProductCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business Product Category'), ['action' => 'delete', $businessProductCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessProductCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Business Product Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business Product Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businessProductCategories view large-9 medium-8 columns content">
    <h3><?= h($businessProductCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Business') ?></th>
            <td><?= $businessProductCategory->has('business') ? $this->Html->link($businessProductCategory->business->name, ['controller' => 'Businesses', 'action' => 'view', $businessProductCategory->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category') ?></th>
            <td><?= $businessProductCategory->has('product_category') ? $this->Html->link($businessProductCategory->product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $businessProductCategory->product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($businessProductCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($businessProductCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($businessProductCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($businessProductCategory->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Business Product Category Id') ?></th>
                <th scope="col"><?= __('Manufacturer') ?></th>
                <th scope="col"><?= __('Year Of Purchasing') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Actual Price') ?></th>
                <th scope="col"><?= __('Asking Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($businessProductCategory->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->user_id) ?></td>
                <td><?= h($products->business_product_category_id) ?></td>
                <td><?= h($products->manufacturer) ?></td>
                <td><?= h($products->year_of_purchasing) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->actual_price) ?></td>
                <td><?= h($products->asking_price) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
