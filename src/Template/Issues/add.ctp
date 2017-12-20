<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <?= $this->Html->image('logo.png', ['alt'=>'Logo',  "height"=>"54"])?>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-bold m-none">Report An Issue</h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($issue, ['data-toggle' => 'validator']); ?>
                    <div class="form-group mb-lg">
                        <label>Name</label>
                        <?= $this->Form->Html('name', ['class' => ['form-control', 'input-lg'],"label" => false, 'required' => true]); ?>
                        <!-- <input name="name" type="text" class="form-control input-lg" /> -->
                    </div>
                    <div class="form-group mb-lg">
                        <label>E-mail Address</label>
                        <?= $this->Form->Html('email', ['class' => ['form-control', 'input-lg'],"label" => false, 'required' => true, 'type' => 'email']); ?>
                        <!-- <input name="email" type="email" class="form-control input-lg" /> -->
                    </div>
                    <div class="form-group mb-lg">
                        <label>Subject</label>
                        <?= $this->Form->Html('subject', ['class' => ['form-control', 'input-lg'],"label" => false, 'required' => true]); ?>
                        <!-- <input name="name" type="text" class="form-control input-lg" /> -->
                    </div>

                    <div class="form-group mb-lg">
                        <label>Description</label>
                        <?= $this->Form->Html('description', ['class' => ['form-control', 'input-lg'],"label" => false, 'required' => true, 'type' => 'textarea']); ?>
                        <!-- <input name="email" type="email" class="form-control input-lg" /> -->
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-4 text-right">
                            <a href="/" class="btn btn-warning">Go Back</a>
                            <button type="submit" class="btn btn-primary hidden-xs">Report</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Report</button>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <?= $this->element('footer') ?>
    </div>
</section>