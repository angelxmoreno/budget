<?php
/* @var $this \Cake\View\View */
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

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('slug'); ?></th>
        <th><?= $this->Paginator->sort('parent_id'); ?></th>
        <th><?= $this->Paginator->sort('lft'); ?></th>
        <th><?= $this->Paginator->sort('rght'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tags as $tag): ?>
        <tr>
            <td><?= $this->Number->format($tag->id) ?></td>
            <td><?= h($tag->name) ?></td>
            <td><?= h($tag->slug) ?></td>
            <td>
                <?= $tag->has('parent_tag') ? $this->Html->link($tag->parent_tag->name,
                    ['controller' => 'Tags', 'action' => 'view', $tag->parent_tag->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($tag->lft) ?></td>
            <td><?= $this->Number->format($tag->rght) ?></td>
            <td><?= h($tag->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $tag->id],
                    ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $tag->id],
                    ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $tag->id], [
                    'confirm' => __('Are you sure you want to delete # {0}?', $tag->id),
                    'title' => __('Delete'),
                    'class' => 'btn btn-default glyphicon glyphicon-trash'
                ]) ?>
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
