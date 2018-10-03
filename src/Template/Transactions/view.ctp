<?php
/**
 * @var $transaction \Axm\Budget\Model\Entity\Transaction
 */
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Transaction'),
    ['action' => 'edit', $transaction->id],
    ['class' => 'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Transaction'),
    ['action' => 'delete', $transaction->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Accounts'),
    ['controller' => 'Accounts', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Account'),
    ['controller' => 'Accounts', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Users'),
    ['controller' => 'Users', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New User'),
    ['controller' => 'Users', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Tags'),
    ['controller' => 'Tags', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Tag'),
    ['controller' => 'Tags', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <?= $this->Html->link(__('Edit Transaction'),
        ['action' => 'edit', $transaction->id],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Form->postLink(__('Delete Transaction'),
        ['action' => 'delete', $transaction->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Transactions'),
        ['action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Transaction'),
        ['action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Accounts'),
        ['controller' => 'Accounts', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Account'),
        ['controller' => 'Accounts', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Users'),
        ['controller' => 'Users', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New User'),
        ['controller' => 'Users', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Tags'),
        ['controller' => 'Tags', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Tag'),
        ['controller' => 'Tags', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($transaction->description) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Account') ?></td>
            <td><?= $transaction->has('account') ? $this->Html->link($transaction->account->name,
                    ['controller' => 'Accounts', 'action' => 'view', $transaction->account->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($transaction->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Subtype') ?></td>
            <td><?= h($transaction->subtype) ?></td>
        </tr>
        <tr>
            <td><?= __('Amount') ?></td>
            <td><?= $this->Number->format($transaction->amount) ?></td>
        </tr>
        <tr>
            <td><?= __('Posted') ?></td>
            <td><?= h($transaction->posted) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Tags') ?></h3>
    </div>
    <?php if (!empty($transaction->tags)): ?>
        <?= $this->element('lists/tags', ['tags' => $transaction->tags]) ?>
    <?php else: ?>
        <p class="panel-body">no Tags</p>
    <?php endif; ?>
</div>
