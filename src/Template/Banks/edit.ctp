<?php
/**
 * @var \Axm\Budget\View\AppView $this
 * @var \Axm\Budget\Model\Entity\Bank $bank
 */
?>
<?php
$this->extend('/Base/dashboard');

$this->start('tb_sidebar');
?>
<?=
$this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $bank->id],
    [
        'confirm' => __('Are you sure you want to delete # {0}?', $bank->id),
        'class' => 'list-group-item'
    ]
) ?>

<?= $this->Html->link(__('List Banks'), ['action' => 'index'], ['class' => 'list-group-item']) ?>
<?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']) ?>

<?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']) ?>

<?php
$this->end();
?>
<?= $this->Form->create($bank); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Bank']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('url');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
