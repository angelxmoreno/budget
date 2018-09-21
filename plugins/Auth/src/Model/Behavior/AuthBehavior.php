<?php

namespace Auth\Model\Behavior;

use Auth\Model\Entity\Auth;
use Cake\ORM\Behavior;

/**
 * Auth behavior
 */
class AuthBehavior extends Behavior
{

    /**
     * @var Auth
     */
    protected $AuthUser;

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @return Auth|null
     */
    public function getAuthUser()
    {
        return $this->AuthUser;
    }

    /**
     * @param Auth $AuthUser
     */
    public function setAuthUser(Auth $AuthUser)
    {
        $this->AuthUser = $AuthUser;
    }
}
