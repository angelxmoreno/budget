<?php
/* @var $this \Cake\View\View */
$this->extend('/Base/dashboard');
$this->start('tb_sidebar');
?>
<?= $this->Html->link(__('New Bank'), ['action' => 'add'], ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index'],
    ['class' => 'list-group-item']); ?>
<?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add'],
    ['class' => 'list-group-item']); ?>
<?php $this->end(); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('url'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($banks as $bank): ?>
        <tr>
            <td><?= h($bank->name) ?></td>
            <td><?= $this->Html->link($bank->url) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $bank->id],
                    ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
