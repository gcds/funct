<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionLastIndexOfTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionLastIndexOfTest extends \PHPUnit_Framework_TestCase
{
    public function testCollectionLastIndexOf()
    {
        $given    = ['a', 'a', 'a'];
        $expected = 2;

        $this->assertSame($expected, Collection\lastIndexOf($given, 'a'));
        $this->assertFalse(Collection\lastIndexOf($given, 'b'));
    }
}
