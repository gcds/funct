<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsPadRightTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsPadRightTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringPadRight()
    {
        $out = [];

        $out[] = ['foo', 0, ' ', 'foo'];
        $out[] = ['foo', 4, ' ', 'foo '];
        $out[] = ['foo', 6, '*', 'foo***'];
        $out[] = ['foo', 2, '_', 'foo'];
        $out[] = ['foo', -1, ' ', 'foo'];
        return $out;
    }

    /**
     * @dataProvider dataStringPadRight
     *
     * @param string $input
     * @param string $length
     * @param string $char
     * @param string $expected
     */
    public function testStringPadRight($input, $length, $char, $expected)
    {
        $this->assertEquals($expected, Strings\padRight($input, $length, $char));
    }
}
