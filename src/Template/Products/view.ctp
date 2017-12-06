<div class="row">
        <?php if(!$userCanEdit && !(isset($product->interested_users) && !empty($product->interested_users))): ?>
            <div id="notifyAlert" class="alert alert-info text-center">
                Intrested in buying this product? <a class="alert-link" href="#" onclick="notifyUser(<?= $product->id ?>)">Click here</a> to notify the seller.
                <br>
                <strong>Note:</strong> Your contact details will be shown to the seller. 
            </div>
        <?php endif; ?>
        <?php  if(isset($product->interested_users) && !empty($product->interested_users)): ?>
            <div id="notifiedAlert" class="alert alert-success text-center">
        <?php else: ?>
            <div id="notifiedAlert" hidden class="alert alert-success text-center">
        <?php endif; ?>
                You have expressed your intrest in buying this product to the seller.
            </div>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?= h($product->name) ?></h2>
            </header>
            <div class="panel-body">
                <p>
                    <?= h($product->description) ?>
                </p>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                <?php if($userCanEdit): ?>
                    <div class="panel-actions">
                        <a href="#" data-toggle="modal" data-target="#addImages"><i class="fa fa-plus fa-lg"></i></a>
                    </div>
                <?php endif; ?>
                <h2 class="panel-title">Product Images</h2>
            </header>
            <div class="panel-body">
                <?php if (!empty($product->product_images)): ?>
                    <div class="popup-gallery">
                        <?php foreach ($product->product_images as $key => $value): ?>
                            <a class="pull-left mb-xs mr-xs" href="<?= $value->image_url ?>" title="Image <?= $key+1 ?>">
                                <div class="img-responsive">
                                    <div class="img-thumbnail">
                                        <img src="<?= $value->image_url ?>" width="100" height="100">
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (empty($product->product_images)): ?>
                    <h4>No images of the product are available</h4>
                <?php endif; ?>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                <?php if($userCanEdit): ?>
                    <div class="panel-actions">
                        <a href="#" data-toggle="modal" data-target="#addBillImages"><i class="fa fa-plus fa-lg"></i></a>
                    </div>
                <?php endif; ?>                
                <h2 class="panel-title">Product Bills</h2>
            </header>
            <div class="panel-body">
                <?php if (!empty($product->product_bills)): ?>
                    <div class="popup-gallery">
                        <?php foreach ($product->product_bills as $key => $value): ?>
                            <a class="pull-left mb-xs mr-xs" href="<?= $value->image_url ?>" title="Bill Image <?= $key+1 ?>">
                                <div class="img-responsive">
                                    <div class="img-thumbnail">    
                                        <img src="<?= $value->image_url ?>" width="100" height="100">
                                    </div>    
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (empty($product->product_bills)): ?>
                    <h4>No bill images of the product are available</h4>
                <?php endif; ?>
            </div>
        </section>
    <section class="panel">
        <header class="panel-heading">
            <?php if($userCanEdit): ?>    
                <div class="panel-actions">
                    <!-- <?=$this->Html->link('Register New Practice', ['action' => 'edit', $product->id],['class' => 'pull-right'])?> -->
                    <?= '<a href="'.$this->Url->build(['action' => 'edit', $product->id]).'"><i class="fa fa-pencil fa-lg"></i></a>' ?>
                </div>
            <?php endif; ?>
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
                <dt><?= __('Listed On') ?>:</dt> <dd> <?= h($product->created) ?> </dd>
            </dl>
        </div>
    </section>
    <?php if($product->show_contact_info): ?>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Seller's Contact Information</h2>
            </header>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt><?= __('Email') ?>:</dt> <dd> <?= h($product->user->email) ?> </dd>
                    <dt><?= __('Phone') ?>:</dt> <dd> <?= h($product->user->phone) ?> </dd>
                </dl>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php if($userCanEdit): ?>
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
                    <button type="button" class="myTriggerImages btn btn-success" ><i class="fa fa-upload"></i> Upload</button>
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
                    <h4 class="modal-title" id="myModalLabel">Add Product Bill Images</h4>
                </div>
                <div class="modal-body">
                         <div class="image_upload_div">
                            <?php  echo $this->Form->create('image',array('url'=>array('controller'=>'ProductBills','action'=>'add'),'method'=>'post','id'=>'bill-images-dropzone','class'=>'dropzone','type'=>'file','autocomplete'=>'off'));?>
                                   <?= $this->Form->input('product_id', ['type' => 'hidden', 'value' => $product->id]) ?> 

                            <?php  echo $this->Form->end();?>
                        </div>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="myTriggerBills btn btn-success" ><i class="fa fa-upload"></i> Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Done</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
        imageList = {};
        billList = {};
        productImages = [];
        productBills = [];
        imageDeleteUrl = "<?=$this->Url->build([ 'controller'=>'ProductImages', 'action' => 'delete', 'prefix' => 'api']) ?>"
        billDeleteUrl = "<?=$this->Url->build([ 'controller'=>'ProductBills', 'action' => 'delete', 'prefix' => 'api']) ?>"

        <?php
            if(!empty($product->product_images)){
                echo "productImages = ".json_encode($product->product_images).";";
            }
            if(!empty($product->product_bills)){
                echo "productBills = ".json_encode($product->product_bills).";";
            }
        ?>

        $(document).ready(function(){

            Dropzone.options.imagesDropzone = {
                paramName: "image_name", // The name that will be used to transfer the file
                addRemoveLinks: true,
                dictRemoveFileConfirmation: "Are you sure you want to remove this Image?",
                clickable: '.myTriggerImages',
                dictDefaultMessage:"Drag and drop to add images or cick on upload button.",
                init:function(){
                    if(productImages.length != 0){
                        for(x in productImages){
                            imageList[productImages[x].image_name] = {
                                id: productImages[x].id,
                                name: productImages[x].image_name,
                                size: productImages[x].size
                            }
                            this.options.addedfile.call(this, imageList[productImages[x].image_name]);
                            this.options.thumbnail.call(this, imageList[productImages[x].image_name], productImages[x].image_url);
                        }
                    }
                },
                success:function(file, response){
                    imageList[file.name] = {id : response.response.id, name : file.name, size:file.size };
                },
                removedfile: function(file) {
                    $.post(imageDeleteUrl+"/"+imageList[file.name].id).done(function() {
                        file.previewElement.remove();
                    }); 
                }
            };

            Dropzone.options.billImagesDropzone = {
                paramName: "image_name", // The name that will be used to transfer the file
                addRemoveLinks: true,
                dictRemoveFileConfirmation: "Are you sure you want to remove this Image?",
                clickable: '.myTriggerBills',
                dictDefaultMessage:"Drag and drop to add images or cick on upload button.",
                init:function(){
                    if(productBills.length != 0){
                        for(x in productBills){
                            billList[productBills[x].image_name] = {
                                id: productBills[x].id,
                                name: productBills[x].image_name,
                                size: productBills[x].size
                            }
                            this.options.addedfile.call(this, billList[productBills[x].image_name]);
                            this.options.thumbnail.call(this, billList[productBills[x].image_name], productBills[x].image_url);
                        }
                    }
                },
                success:function(file, response){
                    billList[file.name] = {id : response.response.id, name : file.name, size:file.size };
                },
                removedfile: function(file) {
                    $.post(billDeleteUrl+"/"+billList[file.name].id).done(function() {
                        file.previewElement.remove();
                    }); 
                }
            };
        });

    </script>
<?php endif; ?> 
<script type="text/javascript">
    
    function notifyUser(productId){
        $.ajax({
            url: hostUrl+"/api/interestedUsers",
            headers:{"accept":"application/json"},
            dataType: 'json',
            data:{
                "product_id" : productId
            },
            type: "post",
            success:function(response){
                $('#notifyAlert').remove();
                $('#notifiedAlert').removeAttr('hidden');
            },
            error:function(response){
                alert('There was an error. Please Try again later.');
                console.log('in error case of notify user.');
                console.log(response);
            },
        });
    }
</script>