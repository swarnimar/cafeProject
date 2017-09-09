<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <?= $this->Html->image('logo.png', ['alt'=>'Logo',  "height"=>"54"])?>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create(null); ?>
                    <div class="form-group mb-lg">
                        <label>Username</label>
                        <div class="input-group input-group-icon">
                            <?= $this->Form->Input('username', ['class' => ['form-control', 'input-lg'],"label" => false, 'placeholder' => 'Username', 'required']); ?>
                            <!-- <input name="username" type="text" class="form-control input-lg" /> -->
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                            <!-- <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#forgotPassword">Forgot Password</button> -->
                            <a href="#" data-toggle="modal" data-target="#forgotPassword" class="pull-right">Lost Password?</a>
                        </div>
                        <div class="input-group input-group-icon">
                            <?= $this->Form->Input('password', ['type' => 'password', 'class' => ['form-control', 'input-lg'], 'placeholder' => 'Password','required', "label" => false]) ?>
                            <!-- <input name="pwd" type="password" class="form-control input-lg" /> -->
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-8 col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs pull">Sign In</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                        </div>
                    </div>

                    <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                        <span>or</span>
                    </span>

                    <div class="mb-xs text-center">
                        <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                        <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
                    </div>

                    <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a>

                <?= $this->Form->end() ?>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All Rights Reserved.</p>
    </div>
</section>

<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= $this->Form->create(null, ['class' => 'form-horizontal','data-toggle'=>"validator"]) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?= __('FORGOT PASSWORD')?></h4>
        </div>

        <div class="modal-body">
          <div class="alert" id="rsp_msg" style=''></div>
          <div class="form-group">
            <?= $this->Form->label('forgotUsername', __('Please enter your username'), ['class' => ['col-sm-4', 'control-label']]); ?>
            <div class="col-sm-8">
              <?= $this->Form->input("forgotUsername", array(
                  "label" => false,
                  'required' => true,
                  'id'=>'forgotUsername',
                  "type"=>"text",
                  "class" => "form-control",'data-minlength'=>8,
                  'placeholder'=>"Enter Username"));
              ?>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
          <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary'], 'type' => 'button','id'=>"forgotUserPassword"]) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>