<?php
/**
 * @var \Axm\Budget\View\AppView $this
 * @var \Axm\Budget\Model\Entity\Tag $tag
 */
?>
<?php
$this->extend('/Base/dashboard');

$this->start('tb_sidebar');
?>
    <?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class'=>'list-group-item']) ?>
    <?= $this->Html->link(__('List Parent Tags'), ['controller' => 'Tags', 'action' => 'index'], ['class'=>'list-group-item']) ?>

    <?= $this->Html->link(__('New Parent Tag'), ['controller' => 'Tags', 'action' => 'add'], ['class'=>'list-group-item']) ?>

    <?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index'], ['class'=>'list-group-item']) ?>

    <?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add'], ['class'=>'list-group-item']) ?>

<?php
$this->end();
?>
<?= $this->Form->create($tag); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Tag']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('slug');
    echo $this->Form->control('parent_id', ['options' => $parentTags]);
    echo $this->Form->control('lft');
    echo $this->Form->control('rght');
    echo $this->Form->control('transactions._ids', ['options' => $transactions]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
