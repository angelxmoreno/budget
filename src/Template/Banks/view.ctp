<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Bank'),
    ['action' => 'edit', $bank->id],
    ['class' => 'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Bank'),
    ['action' => 'delete', $bank->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id), 'class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Banks'),
    ['action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Bank'),
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
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <?= $this->Html->link(__('Edit Bank'),
        ['action' => 'edit', $bank->id],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Form->postLink(__('Delete Bank'),
        ['action' => 'delete', $bank->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id), 'class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Banks'),
        ['action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Bank'),
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
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($bank->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($bank->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($bank->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($bank->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($bank->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Url') ?></td>
            <td><?= $this->Text->autoParagraph(h($bank->url)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Accounts') ?></h3>
    </div>
    <?php if (!empty($bank->accounts)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Bank Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Account Number') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bank->accounts as $accounts): ?>
                <tr>
                    <td><?= h($accounts->id) ?></td>
                    <td><?= h($accounts->bank_id) ?></td>
                    <td><?= h($accounts->user_id) ?></td>
                    <td><?= h($accounts->name) ?></td>
                    <td><?= h($accounts->account_number) ?></td>
                    <td><?= h($accounts->created) ?></td>
                    <td><?= h($accounts->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Accounts', 'action' => 'view', $accounts->id],
                            ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Accounts', 'action' => 'edit', $accounts->id],
                            ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Accounts', 'action' => 'delete', $accounts->id],
                            [
                                'confirm' => __('Are you sure you want to delete # {0}?', $accounts->id),
                                'title' => __('Delete'),
                                'class' => 'btn btn-default glyphicon glyphicon-trash'
                            ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no Accounts</p>
    <?php endif; ?>
</div>
