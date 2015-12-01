<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsCollapseWhiteSpaceTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsCollapseWhiteSpaceTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringCollapseWhitespace()
    {
        $out = [];

        $out[] = ['foo   bar', 'foo bar'];
        $out[] = ['  foo bar   ', ' foo bar '];
        $out[] = ['foo   bar        ', 'foo bar '];

        return $out;
    }

    /**
     * @dataProvider dataStringCollapseWhiteSpace
     *
     * @param string $input
     * @param string $expected
     */
    public function testStringCollapseWhitespace($input, $expected)
    {
        $this->assertEquals($expected, Strings\collapseWhitespace($input));
    }
}
