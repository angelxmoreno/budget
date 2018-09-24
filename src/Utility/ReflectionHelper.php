<?php

namespace Axm\Budget\Utility;

use ReflectionException;
use ReflectionProperty;

/**
 * Class ReflectionHelper
 * @package Axm\Budget\Utility
 */
class ReflectionHelper
{
    /**
     * @param object $obj
     * @param string $name
     * @return mixed
     * @throws ReflectionException
     */
    public static function getPropertyValue($obj, string $name)
    {
        $class = get_class($obj);
        $r_prop = new ReflectionProperty($class, $name);
        $r_prop->setAccessible(true);

        return $r_prop->getValue($obj);
    }
}
