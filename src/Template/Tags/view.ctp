<?php
$this->extend('/Base/dashboard');

$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Tag'),
    ['action' => 'edit', $tag->id],
    ['class' => 'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Tag'),
    ['action' => 'delete', $tag->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Tags'),
    ['action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Tag'),
    ['action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Parent Tags'),
    ['controller' => 'Tags', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Parent Tag'),
    ['controller' => 'Tags', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <?= $this->Html->link(__('Edit Tag'),
        ['action' => 'edit', $tag->id],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Form->postLink(__('Delete Tag'),
        ['action' => 'delete', $tag->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Tags'),
        ['action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Tag'),
        ['action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Parent Tags'),
        ['controller' => 'Tags', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Parent Tag'),
        ['controller' => 'Tags', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Transactions'),
        ['controller' => 'Transactions', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Transaction'),
        ['controller' => 'Transactions', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($tag->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Transactions Count') ?></td>
            <td><?= h($tag->transactions_count) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Transactions') ?></h3>
    </div>
    <?php if (!empty($tag->transactions)): ?>
        <?= $this->element('lists/transactions', ['transactions' => $tag->transactions, 'account_view' => false]) ?>
    <?php else: ?>
        <p class="panel-body">no Transactions</p>
    <?php endif; ?>
</div>
