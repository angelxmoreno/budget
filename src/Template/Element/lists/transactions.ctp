<?php
/**
 * @var $this \Axm\Budget\View\AppView
 * @var $transactions \Axm\Budget\Model\Entity\Transaction[]
 */
$account_view = isset($account_view) ? $account_view : false;
?>
<table class="table table-striped table-condensed">
    <thead>
    <tr>
        <? if (!$account_view): ?>
            <th><?= $this->Paginator->sort('account_id'); ?></th>
        <? endif; ?>
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
            <? if (!$account_view): ?>
                <td>
                    <?= $transaction->has('account') ? $this->Html->link($transaction->account->name,
                        ['controller' => 'Accounts', 'action' => 'view', $transaction->account->id]) : '' ?>
                </td>
            <? endif; ?>

            <td><?= $this->Time->format($transaction->posted, 'EEE LLL d, YYYY') ?></td>
            <td><?= h($transaction->type) ?></td>
            <td><?= h($transaction->subtype) ?></td>
            <td><?= $this->Html->link($transaction->description,
                    ['controller' => 'Transactions', 'action' => 'view', $transaction->id]) ?></td>
            <td><?= $this->Number->currency($transaction->amount) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
