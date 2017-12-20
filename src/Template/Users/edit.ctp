<div class="row">
  <div class="col-lg-12">
    <div class="panel-body">
      <span class="pull-right">
        <?php if($loggedInUser['role_id'] == 1): ?>
          <?=$this->Form->button('Gen. Reset Password Link', ['type' => 'button', 'id' => 'forgotUserPassword','class' => ['btn', 'btn-primary']])?>
        <?php else: ?>  
          <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#changePassword">Change Password</button>
        <?php endif; ?>  
      </span>
    </div>
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
      <?php if($loggedInUser['role_id'] == 1): ?>
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
      <?php endif; ?>  
      <?= $this->Form->hidden('userId', ['label' => false, 'value'=> $user->id, 'required' => true, 'class' => ['form-control']]); ?>
      <?= $this->Form->hidden('forgotUsername', ['label' => false, 'id' => 'forgotUsername','value'=> $user->username, 'required' => true, 'class' => ['form-control']]); ?>
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
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= $this->Form->create(null, ['class' => 'form-horizontal','data-toggle'=>"validator"]) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?= __('CHANGE PASSWORD')?></h4>
        </div>

        <div class="modal-body">
          <div class="alert" id="rsp_msg" style=''></div>
          <div class="form-group">
            <?= $this->Form->label('name', __('Old Password'), ['class' => ['col-sm-4', 'control-label']]); ?>
            <div class="col-sm-8">
              <?= $this->Form->input("old_pwd", array(
                  "label" => false,
                  'required' => true,
                  'id'=>'old_pwd',
                  "type"=>"password",
                  "class" => "form-control",'data-minlength'=>8,
                  'placeholder'=>"Enter Old Password"));
              ?>
            </div>
          </div>

          <div class="form-group">
            <?= $this->Form->label('name', __('New Password'), ['class' => ['col-sm-4', 'control-label']]); ?>
            <div class="col-sm-8">
              <?= $this->Form->input("new_pwd", array(
                "label" => false,
                'id'=>'new_pwd',
                "type"=>"password",
                'required' => true,
                "class" => "form-control",'data-minlength'=>8,
                'placeholder'=>"Enter New Password"));
              ?>
            </div>
          </div>

          <div class="form-group">
            <?= $this->Form->label('name', __('Confirm New Password'), ['class' => ['col-sm-4', 'control-label']]); ?>
            <div class="col-sm-8">
              <?= $this->Form->input("cnf_new_pwd", array(
                "label" => false,
                "type"=>"password",
                'id'=>'cnf_new_pwd',
                'required' => true,
                "class" => "form-control",'data-minlength'=>8,'data-match'=>"#new_pwd",'data-match-error'=>"__('MISMATCH')",'placeholder'=>"Confirm Password"));
              ?>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary'], 'type' => 'button','id'=>"saveUserPassword"]) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>