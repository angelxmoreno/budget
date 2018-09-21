<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Transaction'),
    ['action' => 'edit', $transaction->id],
    ['class' => 'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Transaction'),
    ['action' => 'delete', $transaction->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Accounts'),
    ['controller' => 'Accounts', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Account'),
    ['controller' => 'Accounts', 'action' => 'add'],
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
<?= $this->Html->link(__('List Tags'),
    ['controller' => 'Tags', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Tag'),
    ['controller' => 'Tags', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <?= $this->Html->link(__('Edit Transaction'),
        ['action' => 'edit', $transaction->id],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Form->postLink(__('Delete Transaction'),
        ['action' => 'delete', $transaction->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Transactions'),
        ['action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Transaction'),
        ['action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Accounts'),
        ['controller' => 'Accounts', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Account'),
        ['controller' => 'Accounts', 'action' => 'add'],
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
    <?= $this->Html->link(__('List Tags'),
        ['controller' => 'Tags', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Tag'),
        ['controller' => 'Tags', 'action' => 'add'],
        ['class' => 'list-group-item']
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
            <td><?= __('Id') ?></td>
            <td><?= h($transaction->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Account') ?></td>
            <td><?= $transaction->has('account') ? $this->Html->link($transaction->account->name,
                    ['controller' => 'Accounts', 'action' => 'view', $transaction->account->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->name,
                    ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
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

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Tags') ?></h3>
    </div>
    <?php if (!empty($transaction->tags)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($transaction->tags as $tags): ?>
                <tr>
                    <td><?= h($tags->id) ?></td>
                    <td><?= h($tags->name) ?></td>
                    <td><?= h($tags->slug) ?></td>
                    <td><?= h($tags->parent_id) ?></td>
                    <td><?= h($tags->lft) ?></td>
                    <td><?= h($tags->rght) ?></td>
                    <td><?= h($tags->created) ?></td>
                    <td><?= h($tags->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Tags', 'action' => 'view', $tags->id],
                            ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Tags', 'action' => 'edit', $tags->id],
                            ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Tags', 'action' => 'delete', $tags->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $tags->id),
                            'title' => __('Delete'),
                            'class' => 'btn btn-default glyphicon glyphicon-trash'
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no Tags</p>
    <?php endif; ?>
</div>
