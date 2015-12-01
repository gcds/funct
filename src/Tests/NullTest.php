<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class NullTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class NullTest extends \PHPUnit_Framework_TestCase
{
    public function testNull()
    {
        $value = null;

        $this->assertTrue(Funct\null($value));
    }

    public function testNotNull()
    {
        $value = '';

        $this->assertFalse(Funct\null($value));
    }
}
