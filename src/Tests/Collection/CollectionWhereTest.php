<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionWhereTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionWhereTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionWhere()
    {
        $out = [];

        $out[] = [
            [
                [
                    ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
                    ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
                    ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
                    ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
                    ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
                    ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
                ],
                ['author' => 'Shakespeare', 'year' => 1611]
            ],
            [
                1 => ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
                2 => ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611]
            ]
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionWhere
     */
    public function testCollectionWhere($given, $expected)
    {
        $this->assertEquals($expected, call_user_func_array('Funct\Collection\where', $given));
    }
}
