<div class="row">
    <div class="col-md-10 col-lg-offset-2">
        <h1 class="page-header"><?= $this->request->controller; ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="list-group">
            <?= $this->fetch('tb_sidebar') ?>
        </div>
    </div>
    <div class="col-md-10">
        <?= $this->fetch('content'); ?>
    </div>
</div>
