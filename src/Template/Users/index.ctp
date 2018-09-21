<?php
/* @var $this \Cake\View\View */
$this->extend('/Base/dashboard');
$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']); ?>
<?php $this->end(); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th><?= $this->Paginator->sort('modified'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id],
                    ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $user->id],
                    ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $user->id], [
                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
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
