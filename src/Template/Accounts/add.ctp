<?php
/**
 * @var \Axm\Budget\View\AppView $this
 * @var \Axm\Budget\Model\Entity\Account $account
 */
?>
<?php
$this->extend('/Base/dashboard');

$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('List Accounts'), ['action' => 'index'], ['class' => 'list-group-item']) ?>
<?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add'], ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']) ?>

<?php
$this->end();
?>
<?= $this->Form->create($account); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Account']) ?></legend>
    <?php
    echo $this->Form->control('bank_id', ['options' => $banks]);
    echo $this->Form->control('name');
    echo $this->Form->control('account_number');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
