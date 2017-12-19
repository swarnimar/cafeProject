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
                <div class="col-sm-12">
                    <section class="panel panel-featured-bottom panel-featured-primary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                        <?php if(!empty($value->product_images) && $value->product_images[0]->image_url): ?>
                                            <div class="summary-icon">
                                                <img class="img-circle" src="<?= $value->product_images[0]->image_url ?>" style="max-width: 100%; max-height: 100%; height: 100%; width: 100%">
                                            </div>
                                        <?php else: ?>
                                            <div class="summary-icon bg-primary">
                                                <i class="fa fa-life-ring"></i>
                                            </div>
                                        <?php endif; ?>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="amount">
                                            <?=$value->name?>
                                            <span class="text-success">(<?=$value->manufacturer?>)</span>
                                        </h4>
                                        <div class="info">
                                            <span><?=$value->business_product_category->business->name?> - <?=$value->business_product_category->product_category->name?></span><br>
                                            <strong class="title">
                                                <b>Asking Price :</b> Rs. <?= $value->asking_price?>
                                                <b>Actual Price :</b> Rs. <?= $value->actual_price?>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <?= '<a href="'.$this->Url->build(['action' => 'view', $value->id]).'" class="btn btn-warning">View</a>' ?>
                                        <?php if($loggedInUser['role_id'] == 1 || $loggedInUser['id'] == $value->user_id):?>
                                            <?= '<a href="'.$this->Url->build(['action' => 'edit', $value->id]).'" class="btn btn-primary">Edit</a>' ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $value->id], ['confirm' => __('Are you sure you want to delete {0}?', $value->name), 'class' => ['btn', 'btn-danger']]) ?>
                                        <?php endif; ?> 
                                        <!-- <a class="text-muted text-uppercase">(view all)</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>