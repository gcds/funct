<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsClassifyTest
 *
 * @package Funct\Tests\Strings
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class StringsClassifyTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringClassify()
    {
        $out = [];

        $out[] = ['foo_bar', 'FooBar'];
        $out[] = ['foo-bar', 'FooBar'];
        $out[] = ['foo bar', 'FooBar'];
        $out[] = ['foo1bar', 'Foo1Bar'];
        $out[] = ['FooBar', 'FooBar'];
        $out[] = ['foo', 'Foo'];
        $out[] = ['a_', 'A'];
        $out[] = ['a-', 'A'];

        return $out;
    }

    /**
     * @dataProvider dataStringClassify
     *
     * @param string $input
     * @param string $expected
     */
    public function testStringClassify($input, $expected)
    {
        $this->assertEquals($expected, Strings\classify($input));
    }
}
