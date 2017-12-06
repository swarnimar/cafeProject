<section class="panel">
    <?php if($loggedInUser['role_id'] == 1): ?>    
        <header class="panel-heading text-right">
                <span>
                    <?=$this->Html->link('Add a New Product', ['action' => 'add'], ['class' => ['btn', 'btn-primary']])?>
                </span>
        </header>
    <?php endif; ?> 
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table mb-none">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Business</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Purchace Year</th>
                        <th scope="col">Actual Price</th>
                        <th scope="col">Asking Price</th>
                        <th scope="col">Posted On</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $key => $value): ?>
                        <tr>
                            <td><?= $this->Number->format($key+1) ?></td>
                            <td><?= h($value->business_product_category->business->name) ?></td>
                            <td><?= h($value->business_product_category->product_category->name) ?></td>
                            <td><?= h($value->name) ?></td>
                            <td><?= h($value->manufacturer) ?></td>
                            <td><?= h($value->year_of_purchasing) ?></td>
                            <td><?= h($value->actual_price) ?></td>
                            <td><?= h($value->asking_price) ?></td>
                            <td><?= h($value->created) ?></td>
                            <td class="actions">
                                <?= '<a href="'.$this->Url->build(['action' => 'view', $value->id]).'"><i class="fa fa-eye"></i></a>' ?>
                                <?php if($loggedInUser['role_id'] == 1 || $loggedInUser['id'] == $value->user_id):?>
                                    <?= '<a href="'.$this->Url->build(['action' => 'edit', $value->id]).'"><i class="fa fa-pencil"></i></a>' ?>
                                    <!-- <?= '<a href="'.$this->Url->build(['action' => 'delete', $value->id]).'"><i class="fa fa-trash-o"></i></a>' ?> -->
                                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $value->id], ['confirm' => __('Are you sure you want to delete {0}?', $value->name), 'class' => ['fa', 'fa-trash-o']]) ?>
                                <?php endif; ?> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>