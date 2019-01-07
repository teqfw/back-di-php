<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Di;

/**
 * Framework wrapper for container implementation.
 */
class Container
    extends \League\Container\Container
    implements \TeqFw\Lib\Di\Api\Container
{
    public function populate(string $interface, string $class)
    {
        $obj = $this->get($class);
        assert($obj instanceof $interface);
        $this->share($interface, $obj);
    }

}