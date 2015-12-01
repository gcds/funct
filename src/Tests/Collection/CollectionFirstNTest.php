<?php

namespace Funct\Tests\Invoke;

use Funct\Collection;

/**
 * Class CollectionFirstNTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionFirstNTest extends \PHPUnit_Framework_TestCase
{

    public function testFirst()
    {
        $array  = range(1,9);

        $result = Collection\firstN($array, 3);
        $this->assertEquals([1, 2, 3], $result);
    }
}
