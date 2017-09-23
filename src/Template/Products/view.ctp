<div class="row">
    <?php if (!empty($product->product_images)): ?>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Product Images</h2>
            </header>
            <div class="panel-body">
                <div class="popup-gallery">
                    <?php foreach ($product->product_images as $key => $value): ?>
                        <a class="pull-left mb-xs mr-xs" href="<?= $value->image_url ?>" title="Image <?= $key+1 ?>">
                            <div class="img-responsive">
                                <img src="<?= $value->image_url ?>" width="105">
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (!empty($product->product_bills)): ?>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Product Bills</h2>
            </header>
            <div class="panel-body">
                <div class="popup-gallery">
                    <?php foreach ($product->product_bills as $key => $value): ?>
                        <a class="pull-left mb-xs mr-xs" href="<?= $value->image_url ?>" title="Image <?= $key+1 ?>">
                            <div class="img-responsive">
                                <img src="<?= $value->image_url ?>" width="105">
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Product Details</h2>
        </header>
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
    </section>
</div>