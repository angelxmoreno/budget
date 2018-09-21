<?php
/* @var $this \Cake\View\View */
$this->extend('/Base/dashboard');
$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'], ['class' => 'list-group-item']); ?>
<?php $this->end(); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('account_id'); ?></th>
        <th><?= $this->Paginator->sort('amount'); ?></th>
        <th><?= $this->Paginator->sort('posted'); ?></th>
        <th><?= $this->Paginator->sort('type'); ?></th>
        <th><?= $this->Paginator->sort('subtype'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= h($transaction->id) ?></td>
            <td>
                <?= $transaction->has('account') ? $this->Html->link($transaction->account->name,
                    ['controller' => 'Accounts', 'action' => 'view', $transaction->account->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($transaction->amount) ?></td>
            <td><?= h($transaction->posted) ?></td>
            <td><?= h($transaction->type) ?></td>
            <td><?= h($transaction->subtype) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $transaction->id],
                    ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $transaction->id],
                    ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $transaction->id], [
                    'confirm' => __('Are you sure you want to delete # {0}?', $transaction->id),
                    'title' => __('Delete'),
                    'class' => 'btn btn-default glyphicon glyphicon-trash'
                ]) ?>
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
