<div class="row">
  <div class="col-lg-12">
    <div class="panel-body">
      <?= $this->Form->create($user, ['class' => ['form-horizontal', "form-bordered"]]) ?>
      <div class="form-group">
        <label class="col-md-3 control-label" for="first_name">First Name</label>
        <div class="col-md-6">
          <?= $this->Form->Html('first_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'first name', 'required']); ?>          
        </div>
      </div>
      <div class="form-group">
        <label  class="col-md-3 control-label" for="last_name">Last Name</label>
        <div class="col-md-6">
          <?= $this->Form->Html('last_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'last name', 'required']); ?>        
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="email">Email address</label>
        <div class="col-md-6">
          <?= $this->Form->Html('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'email', 'required']); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="phone">Phone</label>
        <div class="col-md-6">
          <?= $this->Form->Html('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'phone']); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="password">Password</label>
        <div class="col-md-6">
          <?= $this->Form->Html('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'password', 'required']); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="role">Role</label>
        <div class="col-md-6">
          <?= $this->Form->control('role_id', ['label' => false,'required' , 'class' => 'form-control', 'options' => $roles]); ?>
        </div>
      </div>
      <div class="form-group">   
          <label class="col-md-6 control-label">
              <?= $this->Form->checkbox('status', ['label' => false]); ?> Active
          </label>
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