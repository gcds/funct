<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsStripTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsStripTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringStrip()
    {
        $out = [];

        $out[] = [
            [
                ' 1 2 3--__--4 5 6-7__8__9--0',
                ' ',
                '_',
                '-'
            ],
            '1234567890'
        ];

        $out[] = [
            [
                'can words also be stripped out?',
                'words',
                'also',
                'be'
            ],
            'can    stripped out?'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringStrip
     */
    public function testStringStrip($given, $expected)
    {
        $this->assertSame($expected, call_user_func_array('Funct\Strings\strip', $given));
    }
}
