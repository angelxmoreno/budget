<?php
/**
 * @var $this \Axm\Budget\View\AppView
 * @var $accounts \Axm\Budget\Model\Entity\Account[]
 */
$bank_view = isset($bank_view) ? $bank_view : false;
?>
<table class="table table-striped table-condensed" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <? if (!$bank_view): ?>
            <th><?= $this->Paginator->sort('bank_id'); ?></th>
        <? endif; ?>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('account_number'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($accounts as $account): ?>
        <tr>
            <? if (!$bank_view): ?>
                <td>
                    <?= $account->has('bank') ? $this->Html->link($account->bank->name,
                        ['controller' => 'Banks', 'action' => 'view', $account->bank->id]) : '' ?>
                </td>
            <? endif; ?>

            <td><?= h($account->name) ?></td>
            <td><?= h($account->account_number) ?></td>
            <td><?= h($account->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $account->id],
                    ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $account->id],
                    ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $account->id], [
                    'confirm' => __('Are you sure you want to delete # {0}?', $account->id),
                    'title' => __('Delete'),
                    'class' => 'btn btn-default glyphicon glyphicon-trash'
                ]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
