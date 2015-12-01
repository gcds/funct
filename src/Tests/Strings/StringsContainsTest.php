<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsContainsTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsContainsTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringContains()
    {
        $out = [];

        $out[] = ['foo', 'bar', false];
        $out[] = ['foo bar', 'bar', true];
        $out[] = ['foo bar', 'FOO', false];
        $out[] = ['*¤²foo&%$bar@;/', 'foo', true];

        return $out;
    }

    /**
     * @dataProvider dataStringContains
     *
     * @param string $input
     * @param string $substring
     * @param bool   $expected
     */
    public function testStringContains($input, $substring, $expected)
    {
        $this->assertEquals($expected, Strings\contains($input, $substring));
    }
}
