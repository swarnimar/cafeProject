<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($product, [ 'data-toggle'=>"validator", 'class' => 'form-horizontal']) ?>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="business_id">Business</label>
            <div class="col-sm-10">
               <?= $this->Form->control('business_id', ['label' => false,'required' => true, 'class' => 'form-control', 'options' => $businesses]); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="product_category_id">Product Category</label>
            <div class="col-sm-10">
               <?= $this->Form->control('product_category_id', ['label' => false,'required' => true, 'class' => 'form-control', 'options' => $productCategories]); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="manufacturer">Manufacturer</label>
            <div class="col-sm-10">
               <?= $this->Form->control('manufacturer', ['label' => false, 'type'=>'text', 'maxlength' => 50, 'required' => true, 'class' => 'form-control']); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description</label>
            <div class="col-sm-10">
               <?= $this->Form->control('description', ['label' => false, 'type'=>'textarea', 'maxlength' => 50, 'required' => true, 'class' => 'form-control']); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="year_of_purchasing">Purchase Year</label>
            <div class="col-sm-10">
               <?= $this->Form->control('year_of_purchasing', ['label' => false, 'type'=>'number', 'maxlength' => 4, 'required' => true, 'class' => 'form-control']); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="actual_price">Actual Price(Rs.)</label>
            <div class="col-sm-10">
               <?= $this->Form->control('actual_price', ['label' => false, 'type'=>'number','maxlength' => 10, 'required' => true, 'class' => 'form-control']); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="asking_price">Asking Price(Rs.)</label>
            <div class="col-sm-10">
               <?= $this->Form->control('asking_price', ['label' => false, 'type'=>'number', 'maxlength' => 10, 'required' => true, 'class' => 'form-control']); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary'], 'id' => 'saveGiftCoupon']) ?>
                <?= $this->Html->link('Cancel',$this->request->referer(),['class' => ['btn', 'btn-danger']]);?>
            </div>
        </div> 
        <?= $this->Form->end() ?>
    </div>
</div>