<?php

namespace Funct\Tests\Invoke;

use Funct\Collection;

/**
 * Class CollectionLastNTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionLastNTest extends \PHPUnit_Framework_TestCase
{

    public function testLast()
    {
        $array  = range(1,9);

        $result = Collection\lastN($array, 3);
        $this->assertEquals([7, 8, 9], $result);
    }
}
