<?php
/**
 * @var \Axm\Budget\View\AppView $this
 * @var \Axm\Budget\Model\Entity\Transaction $transaction
 * @var array $banks
 * @var array $table_fields
 * @var array $csv_fields
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
    <legend><?= __('Map Import Fields') ?></legend>

    <?= $this->Form->create() ?>
    <table class="table">
        <?= $this->Html->tableHeaders(['CSV Fields', '', 'Table Fields']) ?>

        <tr>
            <td><?= $this->Form->select('bank_id', $banks) ?></td>
            <td>===></td>
            <td>Bank (string)</td>
        </tr>

        <? foreach ($table_fields as $field => $type): ?>
            <tr>
                <td><?= $this->ImportCsv->fieldDropDown($field, $csv_fields, $table_fields, ['empty' => '---']) ?></td>
                <td>===></td>
                <td><?= $field ?> (<?= $type ?>)</td>
            </tr>
        <? endforeach; ?>
    </table>
</fieldset>
<?= $this->Form->button(__('Map Fields')); ?>
<?= $this->Form->end() ?>
