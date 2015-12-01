<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionTailTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionTailTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionTail()
    {
        $out = [];

        $out[] = [[1, 2, 3, 4, 5, 6, 7, 8, 9], [2, 3, 4, 5, 6, 7, 8, 9], 1];
        $out[] = [[1, 2, 3, 4, 5, 6, 7, 8, 9], [3, 4, 5, 6, 7, 8, 9], 2];
        $out[] = [[1, 2, 3, 4, 5, 6, 7, 8, 9], [6, 7, 8, 9], 5];

        return $out;
    }

    /**
     * @dataProvider dataCollectionTail
     */
    public function testCollectionTail($given, $expected, $from)
    {
        $this->assertEquals($expected, Collection\tail($given, $from));
    }
}
