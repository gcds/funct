<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsToSentenceSerialTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsToSentenceSerialTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringToSentenceSerial()
    {
        $out = [];

        $out[] = [
            [
                ['a', 'b'],
            ],
            'a and b'
        ];

        $out[] = [
            [
                ['a', 'b', 'c'],
            ],
            'a, b, and c'
        ];

        $out[] = [
            [
                ['a', 'b', 'c'],
                '# ',
                ' unt '
            ],
            'a# b# unt c'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringToSentenceSerial
     */
    public function testStringToSentenceSerial($given, $expected)
    {
        $this->assertSame($expected, call_user_func_array('Funct\Strings\toSentenceSerial', $given));
    }
}
