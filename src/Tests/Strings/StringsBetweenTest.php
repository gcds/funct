<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsBetweenTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsBetweenTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringBetween()
    {
        $out = [];

        $out[] = ['foo', '<test>', '</test>', ''];
        $out[] = ['<test>foo</test>', '<test>', '</test>', 'foo'];
        $out[] = ['foo <test>bar</test>', '<test>', '</test>', 'bar'];
        $out[] = ['foo<test></test>bar', '<test>', '</test>', ''];

        return $out;
    }

    /**
     * @dataProvider dataStringBetween
     *
     * @param string $input
     * @param string $left
     * @param string $right
     * @param string $expected
     */
    public function testStringBetween($input, $left, $right, $expected)
    {
        $this->assertEquals($expected, Strings\between($input, $left, $right));
    }
}
