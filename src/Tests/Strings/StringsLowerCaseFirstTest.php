<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsLowerCaseFirstTest
 *
 * @package Funct\Tests\Strings
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class StringsLowerCaseFirstTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringLowerCaseFirst()
    {
        $out = [];

        $out[] = ['Foo', 'foo'];
        $out[] = ['FOO', 'fOO'];
        $out[] = ['foo', 'foo'];

        return $out;
    }

    /**
     * @dataProvider dataStringLowerCaseFirst
     *
     * @param $input
     * @param $expected
     */
    public function testStringLowerCaseFirst($input, $expected)
    {
        $this->assertEquals($expected, Strings\lowerCaseFirst($input));
    }
}
