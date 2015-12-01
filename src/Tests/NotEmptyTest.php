<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class NotEmptyTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class NotEmptyTest extends \PHPUnit_Framework_TestCase
{
    public function dataNotEmpty()
    {
        $out = [];

        $out[] = ['String', true];
        $out[] = ['', false];

        return $out;
    }


    /**
     * @dataProvider dataNotEmpty
     *
     * @param mixed $input
     * @param bool  $expected
     */
    public function testNotEmpty($input, $expected)
    {
        $this->assertEquals($expected, Funct\notEmpty($input));
    }
}
