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
<?= $this->Html->link(__('List Transactions'), ['action' => 'index'], ['class' => 'list-group-item']) ?>
<?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add'], ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item']) ?>

<?php
$this->end();
?>
<?= $this->Form->create(null, ['type' => 'file']); ?>
<fieldset>
    <legend><?= __('Upload Transactions') ?></legend>
    <?= $this->Form->input('csv_file', [
        'type' => 'file',
        'label' => 'CSV File'
    ]); ?>
</fieldset>
<?= $this->Form->button(__('Import')); ?>
<?= $this->Form->end() ?>
