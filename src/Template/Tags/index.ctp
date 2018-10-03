<?php
/**
 * @var $this \Cake\View\View
 * @var $tags \Axm\Budget\Model\Entity\Tag[]
 */
$this->extend('/Base/dashboard');
$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('New Tag'), ['action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Parent Tag'), ['controller' => 'Tags', 'action' => 'add'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']); ?>
<?php $this->end(); ?>


<?= $this->element('lists/tags') ?>
<?= $this->element('paginator') ?>
