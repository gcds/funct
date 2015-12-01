<?php

namespace Funct\Tests;

use Funct;

/**
 * Class ArrayKeyNotExistsTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class ArrayKeyNotExistsTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayKeyNotExists()
    {
        $given = ['a' => 1, 'b' => 2, 'c' => 3];

        $this->assertTrue(Funct\arrayKeyNotExists('d', $given));
        $this->assertFalse(Funct\arrayKeyNotExists('c', $given));
    }
}
