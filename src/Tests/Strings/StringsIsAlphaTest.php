<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsIsAlphaTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsIsAlphaTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringIsAlpha()
    {
        $out = [];

        $out[] = ['foo', true];
        $out[] = ['Foo', true];
        $out[] = ['fôõ', false];
        $out[] = ['f()°', false];
        $out[] = ['f00', false];
        $out[] = ['123', false];
        $out[] = ['1.23', false];

        return $out;
    }

    /**
     * @dataProvider dataStringIsAlpha
     *
     * @param string $input
     * @param bool $expected
     */
    public function testStringIsAlpha($input, $expected)
    {
        $this->assertEquals($expected, Strings\isAlpha($input));
    }
}
