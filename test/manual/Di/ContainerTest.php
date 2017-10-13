<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace Test\TeqFw\Arc\Di;

class ContainerTest
    extends \PHPUnit\Framework\TestCase
{

    public function testConstruct()
    {
        $obj = new \TeqFw\Arc\Di\Container();
        $this->assertNotNull($obj);

        /* container should has PSR-11 implementation */
        $hasPsr11 = $obj->has(\Psr\Container\ContainerInterface::class);
        $this->assertTrue($hasPsr11);
    }
}