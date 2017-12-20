<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title text-uppercase"><?= h($issue->subject) ?></h2>
    </header>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt><?= __('Name') ?>:</dt> <dd> <?= h($issue->name) ?> </dd>
            <dt><?= __('Email') ?>:</dt> <dd> <?= h($issue->email) ?> </dd>
            <dt><?= __('Description') ?>:</dt> <dd> <?= h($issue->description) ?> </dd>
            <dt><?= __('Raised On') ?>:</dt> <dd> <?= h($issue->created) ?> </dd>
            <dt><?= __('Status') ?>:</dt> <dd> <?= h($issue->status ? 'Open' : 'Closed') ?> </dd>
        </dl>
        <div class="text-center">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-warning">Go Back</a>
        </div>
    </div>
</section>