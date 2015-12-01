<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionEveryTest
 *
 * @package Funct\Tests\Collection
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class CollectionEveryTest extends \PHPUnit_Framework_TestCase
{
    public function dataCollectionEvery()
    {
        $out = [];

        $out[] = [
            ['', 0, false],
            null,
            false
        ];

        $out[] = [
            ['a', 0, true],
            null,
            false
        ];

        $out[] = [
            ['a', 1, true],
            null,
            true
        ];

        $out[] = [
            [2, 4, 6, 8],
            function ($item) {
                return ($item % 2) === 0;
            },
            true
        ];

        $out[] = [
            [1, 3, 5, 7, 8],
            function ($item) {
                return ($item % 2) !== 0;
            },
            false
        ];

        return $out;
    }

    /**
     * @dataProvider dataCollectionEvery
     */
    public function testCollectionEvery($given, $callback, $expected)
    {
        $this->assertSame($expected, Collection\every($given, $callback));
    }
}
