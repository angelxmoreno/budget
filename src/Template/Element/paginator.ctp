<?php
/**
 * @var \Axm\Budget\View\AppView $this
 */
$options = (isset($options)) ? $options : [];
$this->Paginator->options($options);

?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
</div>
