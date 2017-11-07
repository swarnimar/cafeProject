<div class="row">
  <div class="col-lg-12">
    <div class="panel-body">
      <?= $this->Form->create($business, ['data-toggle'=>"validator", 'name' => 'formAdd', 'class'=> ['form-horizontal', "form-bordered"],'enctype' => 'multipart/form-data']) ?>
      <div class="form-group">
        <label class="col-md-3 control-label" for="first_name">Name</label>
        <div class="col-md-6">
            <?= $this->Form->Html('name', ['label' => false, 'placeholder' => 'Business Name','required' => true, 'class' => ['form-control', 'input-rounded']]); ?>         
        </div>
      </div>
      <div class="form-group">
        <label  class="col-md-3 control-label" for="last_name">Image</label>
        <div class="col-md-6">
          <?= $this->Form->Html('image_name', ['accept'=>"image/*", 'label' => false, 'type'=>'file']); ?>      
        </div>
      </div>
      <div class="form-group">
        <div class="text-center">
          <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary']]) ?>
          <?= $this->Html->link('Cancel',$this->request->referer(),['class' => ['btn', 'btn-danger']]);?>
        </div>
      </div> 
      <?= $this->Form->end() ?>    
    </div>
  </div>
</div>
