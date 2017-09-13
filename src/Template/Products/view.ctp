<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt><?= __('Business') ?>:</dt> <dd> <?= h($product->business_product_category->business->name) ?> </dd>
                <dt><?= __('Product Category') ?>:</dt> <dd> <?= h($product->business_product_category->product_category->name) ?> </dd>
                <dt><?= __('Manufacturer') ?>:</dt> <dd> <?= h($product->manufacturer) ?> </dd>
                <dt><?= __('Year Of Purchasing') ?>:</dt> <dd> <?= h($product->year_of_purchasing) ?> </dd>
                <dt><?= __('Actual Price') ?>:</dt> <dd> <?= h($product->actual_price) ?> </dd>
                <dt><?= __('Asking Price') ?>:</dt> <dd> <?= h($product->asking_price) ?> </dd>
                <dt><?= __('Created') ?>:</dt> <dd> <?= h($product->created) ?> </dd>
            </dl>
        </div>
    </div>
</div>