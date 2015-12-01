<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionInvokeTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionInvokeTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionInvoke()
    {
        $out = [];

        $out[] = [
            [
                ['a', 'b', 'c'],
                'strtoupper'
            ],
            ['A', 'B', 'C']
        ];

        $out[] = [
            [
                ['a', 'b', 'c'],
                function ($item, $prefix) {
                    return $prefix . $item;
                },
                '1'
            ],
            ['1a', '1b', '1c']
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionInvoke
     */
    public function testCollectionInvoke($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\Collection\invoke', $given));
    }
}
