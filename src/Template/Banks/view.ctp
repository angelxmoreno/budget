<?php
/**
 * @var $this \Axm\Budget\View\AppView
 * @var $bank \Axm\Budget\Model\Entity\Bank
 */
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
            <td><?= __('Url') ?></td>
            <td><?= $this->Html->link($bank->url); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Accounts') ?></h3>
    </div>
    <?php if (!empty($bank->accounts)): ?>
        <? $accounts = $bank->accounts ?>
        <?= $this->element('lists/accounts', ['accounts' => $bank->accounts]) ?>
    <?php else: ?>
        <p class="panel-body">no Accounts</p>
    <?php endif; ?>
</div>
