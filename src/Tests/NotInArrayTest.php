<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class NotInArrayTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class NotInArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testNotInArray()
    {
        $a = ['a', 'b', 'c'];

        $this->assertTrue(Funct\notInArray('d', $a));
        $this->assertFalse(Funct\notInArray('a', $a));
    }
}
