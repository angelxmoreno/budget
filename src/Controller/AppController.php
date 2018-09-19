<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace Axm\Budget\Controller;

use Axm\Budget\Model\Entity\User;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 *
 */
class AppController extends Controller
{
    /**
     * @var User
     */
    protected $currentUser;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     * @throws \Exception
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth.Auth');
    }

    /**
     * @throws \Exception
     */
    protected function loadAuth()
    {
        $this->loadComponent('Auth', [
            'loginAction' => [
                'prefix' => null,
                'plugin' => null,
                'controller' => 'Auth',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'prefix' => null,
                'plugin' => null,
                'controller' => 'Projects',
                'action' => 'index'
            ],
            'authError' => 'Did you really think you are allowed to see that?',
            'flash' => [
                'element' => 'error',
                'key' => 'flash'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ],
            'storage' => 'Session',
            'unauthorizedRedirect' => $this->referer()
        ]);
        $this->Auth->allow(['index', 'display', 'view', 'register', 'logout', 'login']);
        $this->setCurrentUser();
    }

    protected function setCurrentUser()
    {
        if ($user_array = $this->Auth->identify()) {
            $this->currentUser = TableRegistry::getTableLocator()
                ->get('Users')
                ->get($user_array['id']);
        }
    }
}
