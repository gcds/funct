<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsCamelizeTest
 *
 * @package Funct\Tests\Strings
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class StringsCamelizeTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringCamelize()
    {
        $out = [];

        $out[] = ['foo_bar', 'fooBar', false];
        $out[] = ['foo-bar', 'fooBar', false];
        $out[] = ['foo bar', 'fooBar', false];
        $out[] = ['foo1bar', 'foo1Bar', false];
        $out[] = ['FooBar', 'fooBar', false];
        $out[] = ['foo', 'foo', false];
        $out[] = ['a_', 'a', false];
        $out[] = ['a-', 'a', false];

        $out[] = ['foo_bar', 'FooBar', true];
        $out[] = ['foo-bar', 'FooBar', true];
        $out[] = ['foo bar', 'FooBar', true];
        $out[] = ['foo1bar', 'Foo1Bar', true];
        $out[] = ['FooBar', 'FooBar', true];
        $out[] = ['foo', 'Foo', true];
        $out[] = ['a_', 'A', true];
        $out[] = ['a-', 'A', true];

        return $out;
    }

    /**
     * @dataProvider dataStringCamelize
     *
     * @param string $input
     * @param string $expected
     * @param bool $uppercase
     */
    public function testStringCamelize($input, $expected, $uppercase)
    {
        $output = Strings\camelize($input, $uppercase);

        $this->assertEquals($expected, $output);
    }
}
