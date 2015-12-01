<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsTruncateTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsTruncateTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringTruncate()
    {
        $out = [];

        $out[] = ['foo', 3, '…', 'foo' ];
        $out[] = ['foo bar', 3, '...', 'foo...' ];
        $out[] = ['foo bar', 5, '---', 'foo ---' ];

        return $out;
    }

    /**
     * @dataProvider dataStringTruncate
     *
     * @param string $input
     * @param string $length
     * @param string $chars
     * @param string $expected
     */
    public function testStringTruncate($input, $length, $chars, $expected)
    {
        $this->assertEquals($expected, Strings\truncate($input, $length, $chars));
    }
}
