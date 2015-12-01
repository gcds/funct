<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionFlattenAllTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionFlattenAllTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionFlattenAll()
    {
        $out = [];

        $out[] = [
            ['a', 'b', ['c']],
            ['a', 'b', 'c']
        ];

        $out[] = [
            ['a', ['b', ['c']]],
            ['a', 'b', 'c'],
        ];

        $out[] = [
            ['a', ['b', ['c', ['d']]]],
            ['a', 'b', 'c', 'd'],
        ];

        $out[] = [
            ['a', ['b', ['c', ['d']]]],
            ['a', 'b', 'c', 'd'],
        ];

        $out[] = [
            ['a', ['b', ['c', ['d']]]],
            ['a', 'b', 'c', 'd'],
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionFlattenAll
     */
    public function testCollectionFlattenAll($given, $expected)
    {
        $this->assertEquals($expected, Collection\flattenAll($given));
    }
}
