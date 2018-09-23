<?php
/**
 * @var $this \Cake\View\View
 * @var $transactions \Axm\Budget\Model\Entity\Transaction[]
 */
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

<table class="table table-striped table-condensed">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('account_id'); ?></th>
        <th><?= $this->Paginator->sort('posted'); ?></th>
        <th><?= $this->Paginator->sort('type'); ?></th>
        <th><?= $this->Paginator->sort('subtype'); ?></th>
        <th><?= $this->Paginator->sort('description'); ?></th>
        <th><?= $this->Paginator->sort('amount'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td>
                <?= $transaction->has('account') ? $this->Html->link($transaction->account->name,
                    ['controller' => 'Accounts', 'action' => 'view', $transaction->account->id]) : '' ?>
            </td>
            <td><?= $this->Time->format($transaction->posted, 'EEE LLL d, YYYY') ?></td>
            <td><?= h($transaction->type) ?></td>
            <td><?= h($transaction->subtype) ?></td>
            <td><?= $this->Html->link($transaction->description, ['action' => 'view', $transaction->id]) ?></td>
            <td><?= $this->Number->currency($transaction->amount) ?></td>
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
