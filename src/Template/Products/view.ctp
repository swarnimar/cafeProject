<div class="row">
    <?php if (!empty($product->product_images)): ?>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" data-toggle="modal" data-target="#addImages"><i class="fa fa-plus fa-lg"></i></a>
                </div>
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
                <div class="panel-actions">
                    <a href="#" data-toggle="modal" data-target="#addBillImages"><i class="fa fa-plus fa-lg"></i></a>
                </div>
                <h2 class="panel-title">Product Bills</h2>
            </header>
            <div class="panel-body">
                <div class="popup-gallery">
                    <?php foreach ($product->product_bills as $key => $value): ?>
                        <a class="pull-left mb-xs mr-xs" href="<?= $value->image_url ?>" title="Bill Image <?= $key+1 ?>">
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
            <div class="panel-actions">
                <!-- <?=$this->Html->link('Register New Practice', ['action' => 'edit', $product->id],['class' => 'pull-right'])?> -->
                <?= '<a href="'.$this->Url->build(['action' => 'edit', $product->id]).'"><i class="fa fa-pencil fa-lg"></i></a>' ?>
            </div>
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
<!-- Product Images -->
<div class="modal fade" id="addImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Product Images</h4>
            </div>
            <div class="modal-body">
                     <div class="image_upload_div">
                        <?php  echo $this->Form->create('image',array('url'=>array('controller'=>'ProductImages','action'=>'add'),'method'=>'post','id'=>'images-dropzone','class'=>'dropzone','type'=>'file','autocomplete'=>'off'));?>
                               
                               <?= $this->Form->input('product_id', ['type' => 'hidden', 'value' => $product->id]) ?> 

                        <?php  echo $this->Form->end();?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>

<!-- Bill Images -->
<div class="modal fade" id="addBillImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Product Images</h4>
            </div>
            <div class="modal-body">
                     <div class="image_upload_div">
                        <?php  echo $this->Form->create('image',array('url'=>array('controller'=>'ProductBills','action'=>'add'),'method'=>'post','id'=>'bill-images-dropzone','class'=>'dropzone','type'=>'file','autocomplete'=>'off'));?>
                               
                               <?= $this->Form->input('product_id', ['type' => 'hidden', 'value' => $product->id]) ?> 

                        <?php  echo $this->Form->end();?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        Dropzone.options.imagesDropzone = {
          paramName: "image_name", // The name that will be used to transfer the file
        };

        Dropzone.options.billImagesDropzone = {
          paramName: "image_name", // The name that will be used to transfer the file
        };
    });

</script>