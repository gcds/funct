<?php

namespace Funct\Tests\CodeBlocks\Collection;

use Funct\CodeBlocks as Funct;

/**
 * Class CollectionGroupByTest
 *
 * @package Funct\Tests\CodeBlocks\Collection
 * @author  Aurimas Niekis <aurimas.niekis@gmail.com>
 */
class CollectionGroupByTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionGroupBy()
    {
        $out = [];

        $out[] = [
            [
                [
                    ['color' => 'red', 'title' => 'foo'],
                    ['color' => 'red', 'title' => 'bar'],
                    ['color' => 'green', 'title' => 'foo'],
                    ['color' => 'green', 'title' => 'bar'],
                    ['color' => 'blue', 'title' => 'foo'],
                    ['color' => 'blue', 'title' => 'bar'],
                ],
                'color'
            ],
            [
                'red'   => [
                    0 => ['color' => 'red', 'title' => 'foo'],
                    1 => ['color' => 'red', 'title' => 'bar']
                ],
                'green' => [
                    2 => ['color' => 'green', 'title' => 'foo'],
                    3 => ['color' => 'green', 'title' => 'bar']
                ],
                'blue'  => [
                    4 => ['color' => 'blue', 'title' => 'foo'],
                    5 => ['color' => 'blue', 'title' => 'bar']
                ]
            ]
        ];

        $out[] = [
            [
                [
                    ['color' => 'red', 'title' => 'foo'],
                    ['color' => 'red', 'title' => 'bar'],
                    ['color' => 'green', 'title' => 'foo'],
                    ['color' => 'green', 'title' => 'bar'],
                    ['color' => 'blue', 'title' => 'foo'],
                    ['color' => 'blue', 'title' => 'bar'],
                ],
                function ($item) {
                    return $item['color'];
                }
            ],
            [
                'red'   => [
                    0 => ['color' => 'red', 'title' => 'foo'],
                    1 => ['color' => 'red', 'title' => 'bar']
                ],
                'green' => [
                    2 => ['color' => 'green', 'title' => 'foo'],
                    3 => ['color' => 'green', 'title' => 'bar']
                ],
                'blue'  => [
                    4 => ['color' => 'blue', 'title' => 'foo'],
                    5 => ['color' => 'blue', 'title' => 'bar']
                ]
            ]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionGroupBy
     */
    public function testCollectionGroupBy($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\CodeBlocks\collection_group_by', $given));
    }
}
