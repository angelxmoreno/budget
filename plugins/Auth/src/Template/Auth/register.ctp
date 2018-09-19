<?php
/**
 * @var \Axm\Budget\View\AppView $this
 * @var \Axm\Budget\Model\Entity\User $user
 */
?>
<?php
$this->extend('/Base/dashboard');

$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('Log In'), ['action' => 'login'], ['class' => 'list-group-item']) ?>
<?php
$this->end();
?>
<?= $this->Form->create(); ?>
<fieldset>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Register')); ?>
<?= $this->Form->end() ?>
