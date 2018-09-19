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
<!--<nav class="navbar navbar-inverse navbar-static-top">-->
<!--    <div class="container">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"-->
<!--                    aria-expanded="false" aria-controls="navbar">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a class="navbar-brand" href="/">Axm\Budget</a>-->
<!--        </div>-->
<!--        <div id="navbar" class="navbar-collapse collapse">-->
<!--            <ul class="nav navbar-nav">-->
<!--                --><?//= $this->Html->activeLiLink(__('Home'), '/') ?>
<!--                --><?//= $this->Html->activeLiLink(__('Projects'),
//                    ['plugin' => null, 'controller' => 'Projects', 'action' => 'index']) ?>
<!--                --><?//= $this->Html->activeLiLink(__('Users'),
//                    ['plugin' => null, 'controller' => 'Users', 'action' => 'index']) ?>
<!--                --><?//= $this->Html->activeLiLink(__('Talents'),
//                    ['plugin' => null, 'controller' => 'Talents', 'action' => 'index']) ?>
<!--                --><?//= $this->Html->activeLiLink(__('Locations'),
//                    ['plugin' => null, 'controller' => 'Locations', 'action' => 'index']) ?>
<!--                <li class="dropdown">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"-->
<!--                       aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li role="separator" class="divider"></li>-->
<!--                        <li class="dropdown-header">Nav header</li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                        <li><a href="#">One more separated link</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul class="nav navbar-nav pull-right">-->
<!--                --><?// if ($this->Auth->isLoggedIn()) : ?>
<!--                    <p class="navbar-text">Helllo --><?//= $this->Auth->user('name') ?><!--</p>-->
<!--                    --><?//= $this->Html->activeLiLink(__('Log Out'), ['_name' => 'auth:logout']) ?>
<!--                --><?// else : ?>
<!--                    --><?//= $this->Html->activeLiLink(__('Log In'), ['_name' => 'auth:login']) ?>
<!--                    --><?//= $this->Html->activeLiLink(__('Register'), ['_name' => 'auth:register']) ?>
<!--                --><?// endif; ?>
<!--            </ul>-->
<!--        </div><!--/.nav-collapse -->
<!--    </div>-->
<!--</nav>-->
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
