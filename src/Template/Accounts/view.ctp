<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Account'),
    ['action' => 'edit',$account->id],
    ['class'=>'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Account'),
    ['action' => 'delete',$account->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $account->id),'class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Accounts'),
    ['action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Account'),
    ['action' => 'add'],
    ['class'=>'list-group-item']
 ) ?>
<?= $this->Html->link(__('List Banks'),
    ['controller' => 'Banks', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Bank'),
    ['controller' => 'Banks', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Users'),
    ['controller' => 'Users', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New User'),
    ['controller' => 'Users', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['controller' => 'Transactions', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['controller' => 'Transactions', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<?= $this->Html->link(__('Edit Account'),
    ['action' => 'edit',$account->id],
    ['class'=>'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Account'),
    ['action' => 'delete',$account->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $account->id),'class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Accounts'),
    ['action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Account'),
    ['action' => 'add'],
    ['class'=>'list-group-item']
 ) ?>
<?= $this->Html->link(__('List Banks'),
    ['controller' => 'Banks', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Bank'),
    ['controller' => 'Banks', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Users'),
    ['controller' => 'Users', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New User'),
    ['controller' => 'Users', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['controller' => 'Transactions', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['controller' => 'Transactions', 'action' => 'add'],
    ['class'=>'list-group-item']
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
            <td><?= $account->has('bank') ? $this->Html->link($account->bank->name, ['controller' => 'Banks', 'action' => 'view', $account->bank->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $account->has('user') ? $this->Html->link($account->user->name, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
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
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($account->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($account->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($account->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Transactions') ?></h3>
    </div>
    <?php if (!empty($account->transactions)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Account Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Posted') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Subtype') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($account->transactions as $transactions): ?>
                <tr>
                    <td><?= h($transactions->id) ?></td>
                    <td><?= h($transactions->account_id) ?></td>
                    <td><?= h($transactions->user_id) ?></td>
                    <td><?= h($transactions->amount) ?></td>
                    <td><?= h($transactions->posted) ?></td>
                    <td><?= h($transactions->type) ?></td>
                    <td><?= h($transactions->subtype) ?></td>
                    <td><?= h($transactions->description) ?></td>
                    <td><?= h($transactions->created) ?></td>
                    <td><?= h($transactions->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Transactions', 'action' => 'view', $transactions->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Transactions', 'action' => 'edit', $transactions->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no Transactions</p>
    <?php endif; ?>
</div>
