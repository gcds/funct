<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsUpperCaseFirstTest
 *
 * @package Funct\Tests\Strings
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class StringsUpperCaseFirstTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringUpperCaseFirst()
    {
        $out = [];

        $out[] = ['foo', 'Foo'];
        $out[] = ['fOO', 'FOO'];
        $out[] = ['Foo', 'Foo'];

        return $out;
    }

    /**
     * @dataProvider dataStringUpperCaseFirst
     *
     * @param $input
     * @param $expected
     */
    public function testStringUpperCaseFirst($input, $expected)
    {
        $this->assertEquals($expected, Strings\upperCaseFirst($input));
    }
}
