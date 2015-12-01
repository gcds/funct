<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionMergeTest
 *
 * @package Funct\Tests\Collection
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class CollectionMergeTest extends \PHPUnit_Framework_TestCase
{
    public function testCollectionMerge()
    {
        $a = ['a', 'b', 'c'];
        $b = ['d', 'e'];
        $c = ['f'];

        $expected = ['a', 'b', 'c', 'd', 'e', 'f'];

        Collection\merge($a, $b, $c);

        $this->assertEquals($expected, $a);
    }
}
