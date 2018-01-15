<section class="panel">
    <?php if($loggedInUser['role_id'] == 1): ?>    
        <header class="panel-heading text-right">
                <span>
                    <?=$this->Html->link('Add a New Product', ['action' => 'add'], ['class' => ['btn', 'btn-primary']])?>
                </span>
        </header>
    <?php endif; ?> 
    <div class="panel-body">
        <div class="row">
            <?php foreach ($products as $key => $value): ?>
                <div class="col-md-4">
                    <section class="panel">
                        <header class="panel-heading text-center">
                                <?php if(!empty($value->product_images) && $value->product_images[0]->image_url): ?>
                                    <img src="<?= $value->product_images[0]->image_url ?>" style="max-width: 100%; max-height: 100%; height: 250px; width: 250px">
                                <?php endif; ?>
                                <?php if(empty($value->product_images) || !$value->product_images[0]->image_url): ?>
                                    <?= $this->Html->image('placeholder.png', ['alt'=>'Logo',  "height"=>"250", 'width' => "250" ])?>
                                <?php endif; ?>
                        </header>
                        <div class="panel-body">
                            <h4 class="text-semibold mt-sm" style="margin-bottom: -2px;"><?=$value->name?></h4>
                            <div class="info">
                                <span><?=$value->business_product_category->business->name?> - <?=$value->business_product_category->product_category->name?></span><br>
                                <strong class="title">
                                    <b>Asking Price :</b> Rs. <?= $value->asking_price?><br>
                                    <b>Actual Price :</b> Rs. <?= $value->actual_price?>
                                </strong>
                            </div>
                            <hr class="solid short">
                            <div class="text-center">
                                <?= '<a href="'.$this->Url->build(['action' => 'view', $value->id]).'" class="btn btn-warning">View</a>' ?>
                                <?php if($loggedInUser['role_id'] == 1 || $loggedInUser['id'] == $value->user_id):?>
                                    <?= '<a href="'.$this->Url->build(['action' => 'edit', $value->id]).'" class="btn btn-primary">Edit</a>' ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $value->id], ['confirm' => __('Are you sure you want to delete {0}?', $value->name), 'class' => ['btn', 'btn-danger']]) ?>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </section>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>