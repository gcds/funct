<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionMinValueTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionMinValueTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionMinValue()
    {
        $out = [];

        $out[] = [
            [
                [
                    10 => [
                        'title' => 'a',
                        'size'  => 1
                    ],
                    20 => [
                        'title' => 'b',
                        'size'  => 2
                    ],
                    30 => [
                        'title' => 'c',
                        'size'  => 3
                    ]
                ],
                function ($item) {
                    return $item['size'];
                }
            ],
            [
                'title' => 'a',
                'size'  => 1
            ]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionMinValue
     */
    public function testCollectionMinValue($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\Collection\minValue', $given));
    }
}
