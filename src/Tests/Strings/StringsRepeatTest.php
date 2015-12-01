<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsRepeatTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsRepeatTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringRepeat()
    {
        $out = [];

        $out[] = ['foo', 0, ''];
        $out[] = ['foo', 1, 'foo'];
        $out[] = ['foo', 3, 'foofoofoo'];

        return $out;
    }

    /**
     * @dataProvider dataStringRepeat
     *
     * @param string $input
     * @param int    $n
     * @param string $expected
     */
    public function testStringRepeat($input, $n, $expected)
    {
        $this->assertEquals($expected, Strings\repeat($input, $n));
    }
}
