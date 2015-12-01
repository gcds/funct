<?php

namespace Funct\Tests\Invoke;

use Funct\Collection;

/**
 * Class CollectionFirstTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionFirstTest extends \PHPUnit_Framework_TestCase
{

    public function testFirst()
    {
        $array  = range(1,9);

        $result = Collection\first($array);
        $this->assertEquals(1, $result);
    }
}
