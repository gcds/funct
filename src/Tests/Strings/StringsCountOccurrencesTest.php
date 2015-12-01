<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsCountTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsCountTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringCountOccurrences()
    {
        $out = [];

        $out[] = ['foo', 'bar', 0];
        $out[] = ['foo', 'foo', 1];
        $out[] = ['foofoo', 'foo', 2];
        $out[] = ['bar foo bar foo', 'bar', 2];

        return $out;
    }

    /**
     * @dataProvider dataStringCountOccurrences
     *
     * @param string $input
     * @param string $substring
     * @param int    $expected
     */
    public function testStringCountOccurrences($input, $substring, $expected)
    {
        $this->assertEquals($expected, Strings\countOccurrences($input, $substring));
    }
}
