<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Business $business
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business'), ['action' => 'edit', $business->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Business Product Categories'), ['controller' => 'BusinessProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business Product Category'), ['controller' => 'BusinessProductCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businesses view large-9 medium-8 columns content">
    <h3><?= h($business->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($business->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($business->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($business->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($business->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Business Product Categories') ?></h4>
        <?php if (!empty($business->business_product_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Business Id') ?></th>
                <th scope="col"><?= __('Product Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($business->business_product_categories as $businessProductCategories): ?>
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
