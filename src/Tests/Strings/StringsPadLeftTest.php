<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsPadLeftTest
 *
 * @package Funct\Tests\Strings
 * @author  Lucantis Swann <lucantis.swann@gmail.com>
 */
class StringsPadLeftTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringPadLeft()
    {
        $out = [];

        $out[] = ['foo', 0, ' ', 'foo'];
        $out[] = ['foo', 4, ' ', ' foo'];
        $out[] = ['foo', 6, '*', '***foo'];
        $out[] = ['foo', 2, '_', 'foo'];
        $out[] = ['foo', -1, ' ', 'foo'];

        return $out;
    }

    /**
     * @dataProvider dataStringPadLeft
     *
     * @param string $input
     * @param string $length
     * @param string $char
     * @param string $expected
     */
    public function testStringPadLeft($input, $length, $char, $expected)
    {
        $this->assertEquals($expected, Strings\padLeft($input, $length, $char));
    }
}
