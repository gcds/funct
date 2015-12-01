<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsChompRightTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsChompRightTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringChompRight()
    {
        $out = [];

        $out[] = ['foo', 'bar', 'foo'];
        $out[] = ['foo', 'foo', ''];
        $out[] = ['foo bar', 'foo', 'foo bar'];
        $out[] = ['foo bar', 'bar', 'foo '];

        return $out;
    }

    /**
     * @dataProvider dataStringChompRight
     *
     * @param string $input
     * @param string $suffix
     * @param string $expected
     */
    public function testStringChompRight($input, $suffix, $expected)
    {
        $this->assertEquals($expected, Strings\chompRight($input, $suffix));
    }
}
