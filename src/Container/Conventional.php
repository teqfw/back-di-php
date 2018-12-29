<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Di\Container;

/**
 * Container to create concrete classes from API interfaces.
 *
 * \Vendor\Path\To\Module\Api\Path\To\Class => \Vendor\Path\To\Module\Path\To\Class
 */
class Conventional
    implements
    \Psr\Container\ContainerInterface,
    \League\Container\ContainerAwareInterface
{
    private const KEY_API = '\\Api\\';

    /**
     * Internal container
     *
     * @var \Psr\Container\ContainerInterface
     */
    private $container;

    public function get($id, bool $new = false)
    {
        $alias = $this->normalizeId($id);
        $result = $this->container->get($alias, $new);
        return $result;
    }

    public function getContainer(): \Psr\Container\ContainerInterface
    {
        return $this->container;
    }

    public function setContainer(\Psr\Container\ContainerInterface $container): \League\Container\ContainerAwareInterface
    {
        $this->container = $container;
        return $this;
    }

    public function has($id)
    {
        $alias = $this->normalizeId($id);
        if ($alias == $id) {
            $result = false;
        } else {
            $result = class_exists($alias);
        }
        return $result;
    }

    /**
     * Convert interface name into class name (if it is possible).
     *
     * @param string $id
     * @return string
     */
    private function normalizeId($id)
    {
        $result = $id;
        /* remove leading '\' if exists */
        if (strpos($id, '\\') === 0) {
            $result = substr($id, 1);
        }
        /* \Vendor\Path\To\Module\Api\Path\To\Class => \Vendor\Path\To\Module\Path\To\Class */
        $replaced = str_replace(self::KEY_API, '\\', $result, $count);
        if ($count == 1) {
            $result = $replaced;
        }
        return $result;
    }
}