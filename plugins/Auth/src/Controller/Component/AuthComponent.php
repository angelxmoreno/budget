<?php

namespace Auth\Controller\Component;

use Auth\Model\Entity\Auth;
use Axm\Budget\Model\Table\TableBase;
use Cake\Controller\Component\AuthComponent as BaseAuthComponent;
use Cake\Event\Event;
use Cake\Event\EventManager;

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

    public function startup(Event $event)
    {
        EventManager::instance()->on('Model.initialize', [$this, 'setAuthUserInModel']);
    }

    public function setAuthUserInModel(Event $event)
    {
        /** @var TableBase $model */
        $model = $event->getSubject();

        if ($model->hasBehavior('Auth') && ($user_data = $this->user())) {
            $user = new Auth($user_data);
            $model->setAuthUser($user);
        }
    }
}
