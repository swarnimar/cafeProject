<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <?= $this->Form->create($product, ['class' => ['form-horizontal', "form-bordered"]]) ?>
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