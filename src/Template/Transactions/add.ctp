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
    <?= $this->Html->link(__('List Transactions'), ['action' => 'index'], ['class'=>'list-group-item']) ?>
    <?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index'], ['class'=>'list-group-item']) ?>

    <?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add'], ['class'=>'list-group-item']) ?>

    <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class'=>'list-group-item']) ?>

    <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class'=>'list-group-item']) ?>

<?php
$this->end();
?>
<?= $this->Form->create($transaction); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Transaction']) ?></legend>
    <?php
    echo $this->Form->control('bank_id', ['options' => $banks]);
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('amount');
    echo $this->Form->control('posted');
    echo $this->Form->control('type');
    echo $this->Form->control('subtype');
    echo $this->Form->control('description');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
