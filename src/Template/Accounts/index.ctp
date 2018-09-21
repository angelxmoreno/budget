<?php
/* @var $this \Cake\View\View */
$this->extend('/Base/dashboard');
$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('New Account'), ['action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Banks'),
    ['controller' => 'Banks', 'action' => 'index'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Bank'),
    ['controller' => 'Banks', 'action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Users'),
    ['controller' => 'Users', 'action' => 'index'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New User'),
    ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Transactions'),
    ['controller' => 'Transactions', 'action' => 'index'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Transaction'),
    ['controller' => 'Transactions', 'action' => 'add'], ['class' => 'list-group-item']); ?>
<?php $this->end(); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
                <th><?= $this->Paginator->sort('id'); ?></th>
                <th><?= $this->Paginator->sort('bank_id'); ?></th>
                <th><?= $this->Paginator->sort('user_id'); ?></th>
                <th><?= $this->Paginator->sort('name'); ?></th>
                <th><?= $this->Paginator->sort('account_number'); ?></th>
                <th><?= $this->Paginator->sort('created'); ?></th>
                <th><?= $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($accounts as $account): ?>
    <tr>
                <td><?= $this->Number->format($< %= $singularVar ?>->< %= $field ?>) ?></td>
                <td>
            <?= $< %= $singularVar ?>->has('bank') ? $this->Html->link($< %= $singularVar ?>->< %= $details['property'] ?>->< %= $details['displayField'] ?>, ['controller' => 'Banks', 'action' => 'view', $< %= $singularVar ?>->< %= $details['property'] ?>->< %= $details['primaryKey'][0] ?>]) : '' ?>
        </td>
                <td>
            <?= $< %= $singularVar ?>->has('user') ? $this->Html->link($< %= $singularVar ?>->< %= $details['property'] ?>->< %= $details['displayField'] ?>, ['controller' => 'Users', 'action' => 'view', $< %= $singularVar ?>->< %= $details['property'] ?>->< %= $details['primaryKey'][0] ?>]) : '' ?>
        </td>
                <td><?= h($< %= $singularVar ?>->< %= $field ?>) ?></td>
                <td><?= h($< %= $singularVar ?>->< %= $field ?>) ?></td>
                <td><?= h($< %= $singularVar ?>->< %= $field ?>) ?></td>
                <td><?= h($< %= $singularVar ?>->< %= $field ?>) ?></td>
                <td class="actions">
            <?= $this->Html->link('', ['action' => 'view', < %= $pk ?>], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', < %= $pk ?>], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', < %= $pk ?>], ['confirm' => __('Are you sure you want to delete # {0}?', < %= $pk ?>), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
