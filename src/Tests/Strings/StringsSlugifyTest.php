<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsSlugifyTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsSlugifyTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringSlugify()
    {
        $out = [];

        $out[] = [
            'Global Thermonuclear Warfare',
            'global-thermonuclear-warfare'
        ];

        $out[] = [
            'Crème brûlée',
            'creme-brulee'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringSlugify
     */
    public function testStringSlugify($given, $expected)
    {
        $this->assertSame($expected, Strings\slugify($given));
    }
}
