<%

use Cake\Utility\Inflector;

$fields = collection($fields)
        ->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
%>
<?php
$this->extend('/Base/dashboard');

$this->start('tb_sidebar');
?>
<% if (strpos($action, 'add') === false): %>
    <?=
    $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
    [
        'confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>),
        'class'=>'list-group-item'
    ]
)?>

<% endif; %>
    <?= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index'], ['class'=>'list-group-item']) ?>
<%
$done = [];
foreach ($associations as $type => $data) {
    foreach ($data as $alias => $details) {
        if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
            %>
    <?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index'], ['class'=>'list-group-item']) %>
    <?= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add'], ['class'=>'list-group-item']) %>
<%
            $done[] = $details['controller'];
        }
    }
}
%>
<?php
$this->end();
?>
<?= $this->Form->create($<%= $singularVar %>); ?>
<fieldset>
    <legend><?= __('<%= Inflector::humanize($action) %> {0}', ['<%= $singularHumanName %>']) ?></legend>
    <?php
<%
    foreach ($fields as $field) {
        if (in_array($field, $primaryKey)) {
            continue;
        }
        if (isset($keyFields[$field])) {
            %>
    echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
<%
            continue;
        }
        if (!in_array($field, ['created', 'modified', 'updated'])) {
            %>
    echo $this->Form->control('<%= $field %>');
<%
        }
    }
    if (!empty($associations['BelongsToMany'])) {
        foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
            %>
    echo $this->Form->control('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
<%
        }
    }
    %>
    ?>
</fieldset>
<%
if (strpos($action, 'add') === false)
    $submitButtonTitle = '__("Save")';
else
    $submitButtonTitle = '__("Add")';
%>
<?= $this->Form->button(<% echo $submitButtonTitle;%>); ?>
<?= $this->Form->end() ?>
