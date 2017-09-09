<section class="panel">
    <header class="panel-heading">
        <span class= "col-sm-offset-10">
            <?=$this->Html->link('Add a New Role', ['controller' => 'roles', 'action' => 'add'], ['class' => ['btn', 'btn-primary']])?>
        </span>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table mb-none">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $key => $value): ?>
                        <tr>
                            <td><?= $this->Number->format($key+1) ?></td>
                            <td><?= h($value->label) ?></td>
                            <td><?= h($value->status ? 'Enabled' : 'Disabled') ?></td>
                            <td><?= h($value->created) ?></td>
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