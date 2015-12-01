<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionPartitionTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionPartitionTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionPartition()
    {
        $out = [];

        $out[] = [
            [
                [0, 1, 2, 3, 4, 5],
                function ($item) {
                    return ($item % 2) === 0;
                }
            ],
            [[0 => 0, 2 => 2, 4 => 4], [1 => 1, 3 => 3, 5 => 5]]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionPartition
     */
    public function testCollectionPartition($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\Collection\partition', $given));
    }
}
