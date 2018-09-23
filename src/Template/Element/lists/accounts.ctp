<?php
/**
 * @var $this \Axm\Budget\View\AppView
 * @var $accounts \Axm\Budget\Model\Entity\Account[]
 */
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('bank_id'); ?></th>
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
            <td><?= $this->Number->format($account->id) ?></td>
            <td>
                <?= $account->has('bank') ? $this->Html->link($account->bank->name,
                    ['controller' => 'Banks', 'action' => 'view', $account->bank->id]) : '' ?>
            </td>
            <td><?= h($account->name) ?></td>
            <td><?= h($account->account_number) ?></td>
            <td><?= h($account->created) ?></td>
            <td><?= h($account->modified) ?></td>
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
