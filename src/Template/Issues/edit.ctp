<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Issue $issue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $issue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Issues'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="issues form large-9 medium-8 columns content">
    <?= $this->Form->create($issue) ?>
    <fieldset>
        <legend><?= __('Edit Issue') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('subject');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
