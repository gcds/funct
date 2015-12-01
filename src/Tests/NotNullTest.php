<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class NotNullTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class NotNullTest extends \PHPUnit_Framework_TestCase
{
    public function dataNotNull()
    {
        $out = [];

        $out[] = ['String', true];
        $out[] = [null, false];

        return $out;
    }


    /**
     * @dataProvider dataNotNull
     *
     * @param mixed $input
     * @param bool  $expected
     */
    public function testNotNull($input, $expected)
    {
        $this->assertEquals($expected, Funct\notNull($input));
    }
}
