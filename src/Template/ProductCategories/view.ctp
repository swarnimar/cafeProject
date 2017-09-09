<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProductCategory $productCategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Category'), ['action' => 'edit', $productCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Category'), ['action' => 'delete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Business Product Categories'), ['controller' => 'BusinessProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business Product Category'), ['controller' => 'BusinessProductCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productCategories view large-9 medium-8 columns content">
    <h3><?= h($productCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Business Product Categories') ?></h4>
        <?php if (!empty($productCategory->business_product_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Business Id') ?></th>
                <th scope="col"><?= __('Product Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productCategory->business_product_categories as $businessProductCategories): ?>
            <tr>
                <td><?= h($businessProductCategories->id) ?></td>
                <td><?= h($businessProductCategories->business_id) ?></td>
                <td><?= h($businessProductCategories->product_category_id) ?></td>
                <td><?= h($businessProductCategories->created) ?></td>
                <td><?= h($businessProductCategories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BusinessProductCategories', 'action' => 'view', $businessProductCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BusinessProductCategories', 'action' => 'edit', $businessProductCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BusinessProductCategories', 'action' => 'delete', $businessProductCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessProductCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
