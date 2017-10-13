<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Arc\Di;

/**
 * Wrapper above League Container (http://container.thephpleague.com/). Adds some magic:
 *  - ability to create default implementations for interfaces;
 */
class Container
    implements \Psr\Container\ContainerInterface
{
    /** @var \League\Container\Container */
    private $inner;

    public function __construct()
    {
        $this->inner = new \League\Container\Container();
        $this->inner->delegate(new \TeqFw\Arc\Di\Container\Conventional());
        $this->inner->add(\Psr\Container\ContainerInterface::class, $this->inner, true);
    }

    public function get($id)
    {
        $result = $this->inner->get($id);
        return $result;
    }

    public function has($id)
    {
        $result = $this->inner->has($id);
        return $result;
    }

}