<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsToSentenceTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsToSentenceTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringToSentence()
    {
        $out = [];

        $out[] = [
            [
                ['a', 'b', 'c'],
            ],
            'a, b and c'
        ];

        $out[] = [
            [
                ['a', 'b', 'c'],
                '# ',
                ' unt '
            ],
            'a# b unt c'
        ];

        return $out;
    }

    /**
     * @dataProvider dataStringToSentence
     */
    public function testStringToSentence($given, $expected)
    {
        $this->assertSame($expected, call_user_func_array('Funct\Strings\toSentence', $given));
    }
}
