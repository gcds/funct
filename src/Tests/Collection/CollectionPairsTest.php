<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionPairsTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionPairsTest extends \PHPUnit_Framework_TestCase
{
    public function testCollectionPairs()
    {
        $given    = ['a', 'b', 'c'];
        $expected = [[0, 'a'], [1, 'b'], [2, 'c']];

        $this->assertEquals($expected, Collection\pairs($given));
    }
}
