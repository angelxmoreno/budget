<?php
$this->extend('/Base/dashboard');


$this->start('tb_actions');
?>
<?= $this->Html->link(__('Edit Tag'),
    ['action' => 'edit', $tag->id],
    ['class' => 'list-group-item']
) ?>
<?= $this->Form->postLink(__('Delete Tag'),
    ['action' => 'delete', $tag->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Tags'),
    ['action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Tag'),
    ['action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Parent Tags'),
    ['controller' => 'Tags', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Parent Tag'),
    ['controller' => 'Tags', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('List Transactions'),
    ['controller' => 'Transactions', 'action' => 'index'],
    ['class' => 'list-group-item']
) ?>
<?= $this->Html->link(__('New Transaction'),
    ['controller' => 'Transactions', 'action' => 'add'],
    ['class' => 'list-group-item']
) ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <?= $this->Html->link(__('Edit Tag'),
        ['action' => 'edit', $tag->id],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Form->postLink(__('Delete Tag'),
        ['action' => 'delete', $tag->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Tags'),
        ['action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Tag'),
        ['action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Parent Tags'),
        ['controller' => 'Tags', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Parent Tag'),
        ['controller' => 'Tags', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('List Transactions'),
        ['controller' => 'Transactions', 'action' => 'index'],
        ['class' => 'list-group-item']
    ) ?>
    <?= $this->Html->link(__('New Transaction'),
        ['controller' => 'Transactions', 'action' => 'add'],
        ['class' => 'list-group-item']
    ) ?>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($tag->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($tag->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Slug') ?></td>
            <td><?= h($tag->slug) ?></td>
        </tr>
        <tr>
            <td><?= __('Parent Tag') ?></td>
            <td><?= $tag->has('parent_tag') ? $this->Html->link($tag->parent_tag->name,
                    ['controller' => 'Tags', 'action' => 'view', $tag->parent_tag->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Lft') ?></td>
            <td><?= $this->Number->format($tag->lft) ?></td>
        </tr>
        <tr>
            <td><?= __('Rght') ?></td>
            <td><?= $this->Number->format($tag->rght) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Tags') ?></h3>
    </div>
    <?php if (!empty($tag->child_tags)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tag->child_tags as $childTags): ?>
                <tr>
                    <td><?= h($childTags->id) ?></td>
                    <td><?= h($childTags->name) ?></td>
                    <td><?= h($childTags->slug) ?></td>
                    <td><?= h($childTags->parent_id) ?></td>
                    <td><?= h($childTags->lft) ?></td>
                    <td><?= h($childTags->rght) ?></td>
                    <td><?= h($childTags->created) ?></td>
                    <td><?= h($childTags->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Tags', 'action' => 'view', $childTags->id],
                            ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Tags', 'action' => 'edit', $childTags->id],
                            ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Tags', 'action' => 'delete', $childTags->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $childTags->id),
                            'title' => __('Delete'),
                            'class' => 'btn btn-default glyphicon glyphicon-trash'
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no Tags</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Transactions') ?></h3>
    </div>
    <?php if (!empty($tag->transactions)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Account Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Posted') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Subtype') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tag->transactions as $transactions): ?>
                <tr>
                    <td><?= h($transactions->id) ?></td>
                    <td><?= h($transactions->account_id) ?></td>
                    <td><?= h($transactions->user_id) ?></td>
                    <td><?= h($transactions->amount) ?></td>
                    <td><?= h($transactions->posted) ?></td>
                    <td><?= h($transactions->type) ?></td>
                    <td><?= h($transactions->subtype) ?></td>
                    <td><?= h($transactions->description) ?></td>
                    <td><?= h($transactions->created) ?></td>
                    <td><?= h($transactions->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('',
                            ['controller' => 'Transactions', 'action' => 'view', $transactions->id],
                            ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('',
                            ['controller' => 'Transactions', 'action' => 'edit', $transactions->id],
                            ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('',
                            ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], [
                                'confirm' => __('Are you sure you want to delete # {0}?', $transactions->id),
                                'title' => __('Delete'),
                                'class' => 'btn btn-default glyphicon glyphicon-trash'
                            ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no Transactions</p>
    <?php endif; ?>
</div>
