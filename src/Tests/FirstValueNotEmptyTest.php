<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class FirstValueNotEmptyTest
 *
 * @package Funct\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class FirstValueNotEmptyTest extends \PHPUnit_Framework_TestCase
{
    public function dataFirstValueNotEmpty()
    {
        $out = [];

        $out[] = [
            ['', 'Foo', 'bar'],
            'Foo'
        ];

        $out[] = [
            ['foo', 'bar'],
            'foo'
        ];

        $out[] = [
            ['', '', 'bar'],
            'bar'
        ];

        $out[] = [
            ['', '', ''],
            null
        ];

        return $out;
    }

    /**
     * @dataProvider dataFirstValueNotEmpty
     *
     * @param array  $arguments
     * @param string $expected
     */
    public function testFirstValueNotEmpty($arguments, $expected)
    {
        $output = call_user_func_array(
            'Funct\\firstValueNotEmpty',
            $arguments
        );

        $this->assertEquals($expected, $output);
    }
}
