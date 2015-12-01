<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionRejectTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionRejectTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionReject()
    {
        $out = [];

        $out[] = [
            [1, 2, 3, 4, 5, 6],
            function ($item) {
                return ($item % 2) == 0;
            },
            [1, 2 => 3, 4 => 5]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionReject
     */
    public function testCollectionReject($given, $callback, $expected)
    {
        $this->assertEquals($expected, Collection\reject($given, $callback));
    }
}
