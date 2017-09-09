<section class="panel">
    
    <div class="panel-body">
        <?= $this->Form->create($business, ['data-toggle'=>"validator", 'name' => 'formAdd', 'class'=> ['form-inline', 'text-center'], 'type'=>'post','url' => ['action' => 'add']]) ?>
            <div class="form-group">
                <label class="sr-only" for="name">Name</label>
                <?= $this->Form->input('name', ['label' => false, 'placeholder' => 'Business Name','required' => true, 'class' => ['form-control', 'input-rounded']]); ?>
            </div>
            <div class="clearfix visible-xs mb-sm"></div>
            <?= $this->Form->button(__('Add Business'), ['class' => ['btn', 'btn-primary']]) ?>
        </form>
    </div>
</section>

<section class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table mb-none">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($businesses as $key => $value): ?>
                        <tr>
                            <td><?= $this->Number->format($key+1) ?></td>
                            <td><?= h($value->name) ?></td>
                            <td class="actions">
                                <?= '<a href="'.$this->Url->build(['action' => 'edit', $value->id]).'"><i class="fa fa-pencil"></i></a>' ?>
                                <!-- <?= '<a href="'.$this->Url->build(['action' => 'delete', $value->id]).'"><i class="fa fa-trash-o"></i></a>' ?> -->
                                <?= $this->Form->postLink(__(''), ['action' => 'delete', $value->id], ['confirm' => __('Are you sure you want to delete {0}?', $value->name), 'class' => ['fa', 'fa-trash-o']]) ?> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>