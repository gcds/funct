<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsLeftTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsLeftTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringLeft()
    {
        $out = [];

        $out[] = [
            [
                'My name is FOOBAR',
                2
            ],
            'My'
        ];

        $out[] = [
            [
                'Hi',
                0
            ],
            ''
        ];

        $out[] = [
            [
                'My name is FOOBAR',
                -6
            ],
            'FOOBAR'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringLeft
     */
    public function testStringLeft($given, $expected)
    {
        $this->assertSame($expected, call_user_func_array('Funct\Strings\left', $given));
    }
}
