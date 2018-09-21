<?php
/**
 * @var \Axm\Budget\View\AppView $this
 * @var \Axm\Budget\Model\Entity\Transaction $transaction
 */
?>
<?php
$this->extend('/Base/dashboard');

$this->start('tb_sidebar');
?>
<?=
$this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $transaction->id],
    [
        'confirm' => __('Are you sure you want to delete # {0}?', $transaction->id),
        'class' => 'list-group-item'
    ]
) ?>

<?= $this->Html->link(__('List Transactions'), ['action' => 'index'], ['class' => 'list-group-item']) ?>
<?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item']) ?>

<?php
$this->end();
?>
<?= $this->Form->create($transaction); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Transaction']) ?></legend>
    <?php
    echo $this->Form->control('account_id', ['options' => $accounts]);
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('amount');
    echo $this->Form->control('posted');
    echo $this->Form->control('type');
    echo $this->Form->control('subtype');
    echo $this->Form->control('description');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
