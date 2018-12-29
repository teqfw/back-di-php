<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Test\TeqFw\Lib\Di\Api;

class ContainerFactoryTest
    extends \PHPUnit\Framework\TestCase
{

    public function testConstruct()
    {
        $obj = \TeqFw\Lib\Di\Api\ContainerFactory::getContainer();
        $this->assertNotNull($obj);

        /* container should has PSR-11 implementation */
        $hasPsr11 = $obj->has(\Psr\Container\ContainerInterface::class);
        $this->assertTrue($hasPsr11);
    }
}