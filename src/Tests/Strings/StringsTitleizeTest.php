<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsTitleizeTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsTitleizeTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringTitleize()
    {
        $out = [];

        $out[] = [
            'man from the boondocks',
            'Man From The Boondocks'
        ];

        $out[] = [
            'x-men: the last stand',
            'X Men: The Last Stand'
        ];

        $out[] = [
            'TheManWithoutAPast',
            'The Man Without A Past'
        ];

        $out[] = [
            'raiders_of_the_lost_ark',
            'Raiders of the Lost Ark',
            ['of', 'the']
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringTitleize
     */
    public function testStringTitleize($given, $expected, array $ignored = [])
    {
        $this->assertSame($expected, Strings\titleize($given, $ignored));
    }
}
