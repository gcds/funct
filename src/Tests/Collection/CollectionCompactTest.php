<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionCompactTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionCompactTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionCompact()
    {
        $out = [];

        $out[] = [['a', 'b', 'c'], ['a', 'b', 'c']];
        $out[] = [['a', 'b', 'c', 0, '', false], ['a', 'b', 'c']];
        $out[] = [['a', 0, 'b', '', 'c', false, 'd'], [0 => 'a', 2 => 'b', 4 => 'c', 6 => 'd']];
        $out[] = [[0, '', false], []];

        return $out;
    }

    /**
     * @dataProvider dataCollectionCompact
     */
    public function testCollectionCompact($given, $expected)
    {
        $this->assertEquals($expected, Collection\compact($given));
    }
}
