<?php

namespace Funct\Tests\CodeBlocks\Collection;

use Funct\CodeBlocks as Funct;

/**
 * Class CollectionZipTest
 *
 * @package Funct\Tests\CodeBlocks\Collection
 * @author  Aurimas Niekis <aurimas.niekis@gmail.com>
 */
class CollectionZipTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionZip()
    {
        $out = [];

        $out[] = [
            [['moe', 'larry', 'curly'], [30, 40, 50], [true, false, false]],
            [['moe', 30, true], ['larry', 40, false], ['curly', 50, false]]
        ];

        $out[] = [
            [['moe', 'larry'], [30, 40, 50], [true, false]],
            [['moe', 30, true], ['larry', 40, false], [null, 50, null]]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionZip
     */
    public function testCollectionZip($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\CodeBlocks\collection_zip', $given));
    }
}
