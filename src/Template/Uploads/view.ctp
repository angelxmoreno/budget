<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Upload'),
    ['action' => 'edit',$upload->id],
    ['class'=>'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Upload'),
    ['action' => 'delete',$upload->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $upload->id),'class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Uploads'),
    ['action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Upload'),
    ['action' => 'add'],
    ['class'=>'list-group-item']
 ) ?>
<?= $this->Html->link(__('List Users'),
    ['controller' => 'Users', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New User'),
    ['controller' => 'Users', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<?= $this->Html->link(__('Edit Upload'),
    ['action' => 'edit',$upload->id],
    ['class'=>'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Upload'),
    ['action' => 'delete',$upload->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $upload->id),'class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('List Uploads'),
    ['action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New Upload'),
    ['action' => 'add'],
    ['class'=>'list-group-item']
 ) ?>
<?= $this->Html->link(__('List Users'),
    ['controller' => 'Users', 'action' => 'index'],
    ['class'=>'list-group-item']
) ?>
<?= $this->Html->link(__('New User'),
    ['controller' => 'Users', 'action' => 'add'],
    ['class'=>'list-group-item']
) ?>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($upload->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $upload->has('user') ? $this->Html->link($upload->user->name, ['controller' => 'Users', 'action' => 'view', $upload->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Map') ?></td>
            <td><?= h($upload->map) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($upload->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Rows') ?></td>
            <td><?= $this->Number->format($upload->rows) ?></td>
        </tr>
        <tr>
            <td><?= __('Progress') ?></td>
            <td><?= $this->Number->format($upload->progress) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($upload->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($upload->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Completed') ?></td>
            <td><?= h($upload->completed) ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= $this->Text->autoParagraph(h($upload->file)); ?></td>
        </tr>
    </table>
</div>

