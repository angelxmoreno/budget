<?php
/**
 * @var \Axm\Budget\View\AppView $this
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css([
        '/vendor/bootstrap/dist/css/bootstrap.css',
        '/vendor/bootstrap/dist/css/bootstrap-theme.css',
        '/vendor/fontawesome/web-fonts-with-css/css/fontawesome-all.css',
    ]) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css([
        'styles',
    ]) ?>

    <?= $this->fetch('meta') ?>
</head>
<body>
<!-- Fixed navbar -->
<?= $this->element('nav') ?>
<div class="container theme-showcase" role="main">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div> <!-- /container -->
<?= $this->Html->script([
    '/vendor/jquery/dist/jquery',
    '/vendor/bootstrap/dist/js/bootstrap',
]) ?>
<?= $this->fetch('script') ?>
<?= $this->Html->script([
    'app',
]) ?>

</body>
</html>
