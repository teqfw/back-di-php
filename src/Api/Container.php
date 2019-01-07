<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Di\Api;

/**
 * PSR-11 compatible container with TeqFW features.
 */
interface Container
    extends \Psr\Container\ContainerInterface
{
    /**
     * @see \League\Container\Container::add
     *
     * @param string $id
     * @param null $concrete
     * @param bool|null $shared
     */
    public function add(string $id, $concrete = null, bool $shared = null);

    /**
     *
     * @see \League\Container\Container::share
     *
     * @param string $id
     * @param null $concrete
     */
    public function share(string $id, $concrete = null);

    /**
     * Create object for given $class and put it into container as implementation of $interface.
     *
     * @param string $interface
     * @param string $class
     */
    public function populate(string $interface, string $class);
}