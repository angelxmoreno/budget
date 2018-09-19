<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Auth',
    ['path' => '/auth'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect(
        '/login',
        [
            'prefix' => null,
            'plugin' => 'Auth',
            'controller' => 'Auth',
            'action' => 'login'
        ],
        ['_name' => 'auth:login']
    )->setMethods(['GET', 'POST']);

    $routes->connect(
        '/logout',
        [
            'prefix' => null,
            'plugin' => 'Auth',
            'controller' => 'Auth',
            'action' => 'logout'
        ],
        ['_name' => 'auth:logout']
    )->setMethods(['GET']);

    $routes->connect(
        '/register',
        [
            'prefix' => null,
            'plugin' => 'Auth',
            'controller' => 'Auth',
            'action' => 'register'
        ],
        ['_name' => 'auth:register']
    )->setMethods(['GET', 'POST']);
});
