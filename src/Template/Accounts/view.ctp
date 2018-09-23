<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Account'),
    ['action' => 'edit', $account->id],
    ['class' => 'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Account'),
    ['action' => 'delete', $account->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $account->id), 'class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Accounts'),
    ['action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Account'),
    ['action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Banks'),
    ['controller' => 'Banks', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Bank'),
    ['controller' => 'Banks', 'action' => 'add'],
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
<?= $this->Html->link(__('List Transactions'),
    ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <?= $this->Html->link(__('Edit Account'),
        ['action' => 'edit', $account->id],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Form->postLink(__('Delete Account'),
        ['action' => 'delete', $account->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $account->id), 'class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Accounts'),
        ['action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Account'),
        ['action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Banks'),
        ['controller' => 'Banks', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Bank'),
        ['controller' => 'Banks', 'action' => 'add'],
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
    <?= $this->Html->link(__('List Transactions'),
        ['controller' => 'Transactions', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Transaction'),
        ['controller' => 'Transactions', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($account->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Bank') ?></td>
            <td><?= $account->has('bank') ? $this->Html->link($account->bank->name,
                    ['controller' => 'Banks', 'action' => 'view', $account->bank->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($account->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Account Number') ?></td>
            <td><?= h($account->account_number) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($account->created) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
       <div class="pull-left">
           <h3 class="panel-title">
               <?= __('Transactions') ?>
           </h3>
       </div>
        <div class="pull-right">
            <?= $this->element('paginator') ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php if (!empty($account->transactions)): ?>
        <?= $this->element('lists/transactions', ['transactions' => $account->transactions, 'account_view' => true]) ?>
    <?php else: ?>
        <p class="panel-body">no Transactions</p>
    <?php endif; ?>
</div>
