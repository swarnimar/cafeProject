<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <?= $this->Form->create($product, ['class' => ['form-horizontal', "form-bordered"], 'enctype' => 'multipart/form-data']) ?>
            <div class="form-group">
                <label class="col-md-3 control-label" for="business_id">Business</label>
                <div class="col-md-6">
                 <?= $this->Form->control('business_id', ['label' => false,'required' , 'class' => 'form-control', 'options' => $businesses]); ?>
             </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label" for="product_category_id">Product Category</label>
            <div class="col-md-6">
                <?= $this->Form->control('product_category_id', ['label' => false,'required' , 'class' => 'form-control', 'options' => $productCategories]); ?>
             </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="manufacturer">Manufacturer</label>
        <div class="col-md-6">
         <?= $this->Form->Html('manufacturer', ['label' => false, 'type'=>'text', 'maxlength' => 50, 'required' , 'class' => 'form-control']); ?>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="description">Description</label>
        <div class="col-md-6">
         <?= $this->Form->Html('description', ['label' => false, 'type'=>'textarea', 'maxlength' => 50, 'required' , 'class' => 'form-control']); ?>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="year_of_purchasing">Purchase Year</label>
        <div class="col-md-6">
         <?= $this->Form->Html('year_of_purchasing', ['label' => false, 'type'=>'number', 'maxlength' => 4, 'required' , 'class' => 'form-control']); ?>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="actual_price">Actual Price(Rs.)</label>
        <div class="col-md-6">
         <?= $this->Form->Html('actual_price', ['label' => false, 'type'=>'number','maxlength' => 10, 'required' , 'class' => 'form-control']); ?>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="asking_price">Asking Price(Rs.)</label>
        <div class="col-md-6">
         <?= $this->Form->Html('asking_price', ['label' => false, 'type'=>'number', 'maxlength' => 10, 'required' , 'class' => 'form-control']); ?>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="image">Product Images</label>
        <div class="col-md-6">
         <?= $this->Form->Html('product_images[].image_name', ['accept'=>"image/*", 'label' => false, 'type'=>'file', 'multiple']); ?>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="image">Product Bill Images</label>
        <div class="col-md-6">
         <?= $this->Form->Html('product_bills[].image_name', ['accept'=>"image/*", 'label' => false, 'type'=>'file', 'multiple']); ?>
        </div>
        </div>
        <div class="form-group">   
          <div class="text-center">
              <label class="control-label">
                  <?= $this->Form->checkbox('show_contact_info', ['label' => false]); ?> Show Contact Info
              </label>
          </div>
        </div>
        <div class="form-group">
        <div class="text-center">
            <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary'], 'id' => 'saveGiftCoupon']) ?>
            <?= $this->Html->link('Cancel',$this->request->referer(),['class' => ['btn', 'btn-danger']]);?>
        </div>
        </div> 
<?= $this->Form->end() ?>    
</div>
</div>
</div>
<div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Product Images Here</h4>
            </div>
            <div class="modal-body">
               <form>
                    
               </form>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="getImages()">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
   
    function getImages(){
        console.log('here');
    }
</script>