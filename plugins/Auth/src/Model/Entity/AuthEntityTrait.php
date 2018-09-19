<?php

namespace Auth\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Trait UserEntityTrait
 * @package Auth\Model\Entity
 */
trait AuthEntityTrait
{
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
