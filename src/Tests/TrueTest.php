<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class TrueTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class TrueTest extends \PHPUnit_Framework_TestCase
{
    public function testFalse()
    {
        $value = false;

        $this->assertFalse(Funct\true($value));
    }

    public function testTrue()
    {
        $value = true;

        $this->assertTrue(Funct\true($value));
    }
}
