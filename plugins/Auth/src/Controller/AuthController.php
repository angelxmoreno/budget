<?php

namespace Auth\Controller;

use Auth\Model\Table\AuthsTable;

/**
 * Auth Controller
 *
 * @property AuthsTable $Auths
 */
class AuthController extends AppController
{
    public $modelClass = null;

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Auth.Auths');

        $this->Auth->allow(['register', 'login']);
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null
     */
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


    /**
     * Register method
     *
     * @return \Cake\Http\Response|null
     */
    public function register()
    {
        $this->redirectIfLoggedIn();
        $user = $this->Auths->newEntity([
            'is_admin' => false,
            'is_active' => true
        ]);
        if ($this->request->is('post')) {
            $user = $this->Auths->patchEntity($user, $this->request->getData());
            if ($this->Auths->save($user)) {
                $this->Flash->success(__('Registration Successful'));

                return $this->redirect(['action' => 'login']);
            }
            dd($user, $user->getErrors(), $this->request->getData());
            $this->Flash->error(__('Can not register. Please, try again.'));
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response
     */
    public function logout()
    {
        $this->Flash->success(__('You are now logged out.'));

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
