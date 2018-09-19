<?php
namespace Axm\Budget\View\Helper;

use Cake\Utility\Hash;
use Cake\View\Helper;

/**
 * Auth helper
 */
class AuthHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function isLoggedIn()
    {
        return !!$this->getAuthArray();
    }

    public function user($key = null)
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

    protected function getAuthArray()
    {
        return $this->getSession()->read('Auth.User');
    }
    protected function getSession()
    {
        return $this->request->getSession();
    }
}
