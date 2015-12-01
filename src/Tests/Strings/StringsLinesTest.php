<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsLinesTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsLinesTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringLines()
    {
        $out = [];

        $out[] = [
            "My name is FooBar\nPHP is my favorite language\r\nWhat is your favorite language?",
            [
                'My name is FooBar',
                'PHP is my favorite language',
                'What is your favorite language?'
            ]
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringLines
     */
    public function testStringLines($given, $expected)
    {
        $this->assertSame($expected, Strings\lines($given));
    }
}
