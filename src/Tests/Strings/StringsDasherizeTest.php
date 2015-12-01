<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsDasherizeTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsDasherizeTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringDasherize()
    {
        $out = [];

        $out[] = [
            'a_farewell_to_arms',
            'a-farewell-to-arms'
        ];

        $out[] = [
            'capsLock',
            'caps-lock'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringDasherize
     */
    public function testStringDasherize($given, $expected)
    {
        $this->assertSame($expected, Strings\dasherize($given));
    }
}
