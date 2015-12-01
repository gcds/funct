<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsEndsWithTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsEndsWithTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringEndsWith()
    {
        $out = [];

        $out[] = ['foo', 'bar', false];
        $out[] = ['foo', 'foo', true];
        $out[] = ['foo bar', 'foo', false];
        $out[] = ['foo bar', 'bar', true];

        return $out;
    }

    /**
     * @dataProvider dataStringEndsWith
     *
     * @param string $input
     * @param string $substring
     * @param string $expected
     */
    public function testStringEndsWith($input, $substring, $expected)
    {
        $this->assertEquals($expected, Strings\endsWith($input, $substring));
    }
}
