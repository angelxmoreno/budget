<?php

namespace Auth\Controller\Component;

use Cake\Controller\Component\AuthComponent as BaseAuthComponent;

/**
 * Auth component
 */
class AuthComponent extends BaseAuthComponent
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'loginAction' => [
            'prefix' => null,
            'plugin' => 'Auth',
            'controller' => 'Auth',
            'action' => 'login'
        ],
        'loginRedirect' => '/',
        'authError' => 'You need to log in to access that.',
        'flash' => [
            'element' => 'error',
            'key' => 'flash'
        ],
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'email'],
                'userModel' => 'Auth.Auths'
            ]
        ],
        'storage' => 'Session',
        'unauthorizedRedirect' => null,
        'checkAuthIn' => 'Controller.initialize',
    ];
}
