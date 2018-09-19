<?php
namespace Axm\Budget\Controller;

use Axm\Budget\Model\Table\UsersTable;

/**
 * Auth Controller
 *
 * @property UsersTable $Users
 */
class AuthController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    public function login()
    {
        $this->redirectIfLoggedIn();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Welcome Back'));

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your email/password are incorrect.'));
        }
    }

    public function register()
    {
        $this->redirectIfLoggedIn();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration Successful'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Can not register. Please, try again.'));
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');

        return $this->redirect($this->Auth->logout());
    }

    protected function redirectIfLoggedIn()
    {
        if ($this->Auth->user()) {
            $this->Flash->info(__('You are already logged in.'));
            $default_redirect_target = $this->Auth->redirectUrl();
            $current_referer = $this->referer($default_redirect_target, true);
            $this->redirect($current_referer);
        }
    }
}
