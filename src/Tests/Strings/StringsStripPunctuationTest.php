<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsStripPunctuationTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsStripPunctuationTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringStripPunctuation()
    {
        $out = [];

        $out[] = [
            'My, st[ring] *full* of %punct)',
            'My string full of punct'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringStripPunctuation
     */
    public function testStringStripPunctuation($given, $expected)
    {
        $this->assertSame($expected, Strings\stripPunctuation($given));
    }
}
