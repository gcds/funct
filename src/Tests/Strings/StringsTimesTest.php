<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsTimesTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsTimesTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringTimes()
    {
        $out = [];

        $out[] = ['foo', 0, ''];
        $out[] = ['foo', 1, 'foo'];
        $out[] = ['foo', 3, 'foofoofoo'];

        return $out;
    }

    /**
     * @dataProvider dataStringTimes
     *
     * @param string $input
     * @param string $n
     * @param string $expected
     */
    public function testStringTimes($input, $n, $expected)
    {
        $this->assertEquals($expected, Strings\times($input, $n));
    }
}
