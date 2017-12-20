<section class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table mb-none">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($issues as $key => $value): ?>
                        <tr>
                            <td><?= $this->Number->format($key+1) ?></td>
                            <td><?= h($value->name) ?></td>
                            <td><?= h($value->email) ?></td>
                            <td><?= h($value->subject) ?></td>
                            <td><?= h($value->status ? 'Open' : 'Closed') ?></td>
                            <td class="actions">
                                <?= '<a title="View" href="'.$this->Url->build(['action' => 'view', $value->id]).'"><i class="fa fa-eye"></i></a>' ?>
                                <?php if($value->status):?>
                                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $value->id], ['confirm' => __('Are you sure you want to close this issue?'), 'class' => ['fa', 'fa-check'], 'title' => 'Close Issue']) ?>
                                <?php endif; ?> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>