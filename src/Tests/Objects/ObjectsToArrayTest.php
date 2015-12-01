<?php

namespace Funct\Tests\Objects;

use Funct\Object;
use Funct\Tests\Fixtures\SampleObject;;

/**
 * Class ObjectsToArrayTest
 *
 * @package Funct\Tests\Objects
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class ObjectsToArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testObjectsToArray()
    {
        $a = new SampleObject();
        $a->setBar('foo1');
        $a->setFoo('bar');

        $b = clone $a;
        $b->setBar('foo2');

        $c = clone $a;
        $c->setBar('foo3');

        $d = clone $a;
        $d->setBar('foo4');

        $objects = [$a, $b, $c, $d];

        $expected = ['bar', 'bar', 'bar', 'bar'];

        $this->assertEquals($expected, Object\toArray($objects, 'getFoo'));

        $expected = [
            'foo1' => 'bar',
            'foo2' => 'bar',
            'foo3' => 'bar',
            'foo4' => 'bar',
        ];

        $this->assertEquals($expected, Object\toArray($objects, 'getFoo', 'getBar'));
    }
}
