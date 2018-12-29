<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Di\Api;

/**
 * Entry point to get DI container.
 */
class ContainerFactory
{
    /**
     * There is one only application container.
     *
     * @var \TeqFw\Lib\Di\Api\Container
     */
    private static $container;

    /**
     * Create application container, setup delegates to create conventionally and reflectionally,
     * link container with PSR interface & TeqFW Container interface.
     */
    public function __construct()
    {
        if (!self::$container) {
            /* base container is a League container */
            $container = new \League\Container\Container();
            /* add TeqFW conventional container */
            $convention = new \TeqFw\Lib\Di\Container\Conventional();
            $container->delegate($convention);
            /* add reflection container */
            $reflection = new \League\Container\ReflectionContainer();
            $container->delegate($reflection);
            /* link interfaces with object to get container by interface name */
            $container->share(\Psr\Container\ContainerInterface::class, $container);
            /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
            $container->share(\TeqFw\Lib\Di\Api\Container::class, $container);

            /* set as singleton */
            self::$container = $container;
        }

    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public static function getContainer()
    {
        if (!self::$container) {
            /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
            new \TeqFw\Lib\Di\Api\ContainerFactory();
        }
        return self::$container;
    }
}