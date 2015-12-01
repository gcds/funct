<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionIntersectionTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionIntersectionTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionIntersection()
    {
        $out = [];

        $out[] = [
            [
                [1, 2, 3],
                [3, 4, 5],
                [6, 7, 3],
                [3, 2, 1]
            ],
            [2 => 3]
        ];

        $out[] = [
            [
                [1, 2, 3],
                [101, 2, 1, 10],
                [2, 1]
            ],
            [1, 2]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionIntersection
     */
    public function testCollectionIntersection($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\Collection\intersection', $given));
    }
}
