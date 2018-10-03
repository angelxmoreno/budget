<?php
/**
 * @var $this \Axm\Budget\View\AppView
 * @var $tags \Axm\Budget\Model\Entity\Tag[]
 */
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('transactions_count'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($tags as $tag): ?>
        <tr>
            <td><?= h($tag->name) ?></td>
            <td><?= $this->Number->format($tag->transactions_count) ?></td>
            <td><?= h($tag->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['controller' => 'tags', 'action' => 'view', $tag->id],
                    ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['controller' => 'tags', 'action' => 'edit', $tag->id],
                    ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['controller' => 'tags', 'action' => 'delete', $tag->id], [
                    'confirm' => __('Are you sure you want to delete # {0}?', $tag->id),
                    'title' => __('Delete'),
                    'class' => 'btn btn-default glyphicon glyphicon-trash'
                ]) ?>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>
