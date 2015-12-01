<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionWithoutTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionWithoutTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionWithout()
    {
        $out = [];

        $out[] = [
            [
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                2
            ],
            [0 => 1, 2 => 3, 3 => 4, 4 => 5, 5 => 6, 6 => 7, 7 => 8, 8 => 9, 9 => 10]
        ];

        $out[] = [
            [
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                2,
                4,
                6,
                8,
                10
            ],
            [0 => 1, 2 => 3, 4 => 5, 6 => 7, 8 => 9]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionWithout
     */
    public function testCollectionWithout($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\Collection\without', $given));
    }
}
