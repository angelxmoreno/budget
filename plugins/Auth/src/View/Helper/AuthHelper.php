<?php

namespace Auth\View\Helper;

use Cake\Utility\Hash;
use Cake\View\Helper;

/**
 * Auth helper
 */
class AuthHelper extends Helper
{

    /**
     * @return bool
     */
    public function isLoggedIn() : bool
    {
        return !!$this->getAuthArray();
    }

    /**
     * @return array
     */
    protected function getAuthArray() : array
    {
        return $this->getSession()->read('Auth.User') ?: [];
    }

    /**
     * @return \Cake\Http\Session
     */
    protected function getSession()
    {
        return $this->request->getSession();
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function user(string $key = null)
    {
        $user = $this->getAuthArray();
        if (!$user) {
            return null;
        }

        if ($key === null) {
            return $user;
        }

        return Hash::get($user, $key);
    }
}
