<?php

namespace Funct\Tests\Invoke;

use Funct\Collection;

/**
 * Class CollectionLastTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionLastTest extends \PHPUnit_Framework_TestCase
{

    public function testLast()
    {
        $array  = range(1,9);

        $result = Collection\last($array);
        $this->assertEquals(9, $result);
    }
}
