<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Transaction'),
    ['action' => 'edit',$transaction->id],
    ['class'=>'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Transaction'),
    ['action' => 'delete',$transaction->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id),'class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
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
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<?= $this->Html->link(__('Edit Transaction'),
    ['action' => 'edit',$transaction->id],
    ['class'=>'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Transaction'),
    ['action' => 'delete',$transaction->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id),'class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
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
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($transaction->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Bank') ?></td>
            <td><?= $transaction->has('bank') ? $this->Html->link($transaction->bank->name, ['controller' => 'Banks', 'action' => 'view', $transaction->bank->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->name, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
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
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Amount') ?></td>
            <td><?= $this->Number->format($transaction->amount) ?></td>
        </tr>
        <tr>
            <td><?= __('Posted') ?></td>
            <td><?= h($transaction->posted) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($transaction->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($transaction->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($transaction->description)); ?></td>
        </tr>
    </table>
</div>

