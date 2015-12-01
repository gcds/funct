<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsUnderscoreTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsUnderscoreTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringUnderscore()
    {
        $out = [];

        $out[] = [
            'a-farewell-to-arms',
            'a_farewell_to_arms'
        ];

        $out[] = [
            'capsLock',
            'caps_lock'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringUnderscore
     */
    public function testStringUnderscore($given, $expected)
    {
        $this->assertSame($expected, Strings\underscore($given));
    }
}
