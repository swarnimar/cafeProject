<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Business Product Categories'), ['controller' => 'BusinessProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business Product Category'), ['controller' => 'BusinessProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Bills'), ['controller' => 'ProductBills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Bill'), ['controller' => 'ProductBills', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Images'), ['controller' => 'ProductImages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Image'), ['controller' => 'ProductImages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('business_product_category_id', ['options' => $businessProductCategories]);
            echo $this->Form->control('manufacturer');
            echo $this->Form->control('year_of_purchasing');
            echo $this->Form->control('description');
            echo $this->Form->control('actual_price');
            echo $this->Form->control('asking_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
