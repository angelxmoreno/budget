<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?= Cake\Core\Configure::read('APP_NAME') ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?= $this->Html->activeLiLink(__('Home'), '/') ?>

                <?= $this->Html->activeLiLink(__('Banks'),
                    ['plugin' => null, 'controller' => 'Banks', 'action' => 'index']) ?>

                <?= $this->Html->activeLiLink(__('Accounts'),
                    ['plugin' => null, 'controller' => 'Accounts', 'action' => 'index']) ?>

                <?= $this->Html->activeLiLink(__('Transactions'),
                    ['plugin' => null, 'controller' => 'Transactions', 'action' => 'index']) ?>

                <?= $this->Html->activeLiLink(__('Import'),
                    ['plugin' => null, 'controller' => 'Import', 'action' => 'index']) ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <? if ($this->Auth->isLoggedIn()) : ?>
                    <p class="navbar-text">Helllo <?= $this->Auth->user('name') ?></p>
                    <?= $this->Html->activeLiLink(__('Log Out'), ['_name' => 'auth:logout']) ?>
                <? else : ?>
                    <?= $this->Html->activeLiLink(__('Log In'), ['_name' => 'auth:login']) ?>
                    <?= $this->Html->activeLiLink(__('Register'), ['_name' => 'auth:register']) ?>
                <? endif; ?>
            </ul>
        </div>
    </div>
</nav>
