<?php

namespace Funct\Tests\Invoke;

use Funct\Invoke;

/**
 * Class InvokeIfConditionTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
class InvokeIfConditionTest extends \PHPUnit_Framework_TestCase
{
    protected $callbackWasCalled;
    protected $callbackArguments;

    protected static $staticCallbackWasCalled;
    protected static $staticCallbackArguments;

    public function setUp()
    {
        $this->callbackWasCalled = false;
        $this->callbackArguments = null;
        self::$staticCallbackWasCalled = false;
        self::$staticCallbackArguments = null;
    }

    public function dataInvokeIf()
    {
        $out = [];

        $out[] = [[], true];
        $out[] = [[], false];
        $out[] = [['foo', 'bar'], true];
        $out[] = [['foo', 'bar'], false];

        return $out;
    }

    /**
     * @dataProvider dataInvokeIf
     *
     * @param array $arguments
     * @param bool $condition
     */
    public function testInvokeIf($arguments, $condition)
    {
        Invoke\ifCondition([$this, 'fakeCallback'], $arguments, $condition);

        $should = $condition ? 'be' : 'not';

        $this->assertEquals($condition, $this->callbackWasCalled, 'The function should ' . $should . ' called');

        if (true === $condition) {
            $this->assertEquals($arguments, $this->callbackArguments);
        }
    }

    /**
     * @dataProvider dataInvokeIf
     *
     * @param array $arguments
     * @param bool $condition
     */
    public function testInvokeIfWithStaticFunction($arguments, $condition)
    {
        Invoke\ifCondition([self::class, 'fakeStaticCallback'], $arguments, $condition);

        $should = $condition ? 'be' : 'not';

        $this->assertEquals($condition, self::$staticCallbackWasCalled, 'The function should ' . $should . ' called');

        if (true === $condition) {
            $this->assertEquals($arguments, self::$staticCallbackArguments);
        }
    }

    public function fakeCallback()
    {
        $this->callbackWasCalled = true;
        $this->callbackArguments = func_get_args();
    }

    public static function fakeStaticCallback()
    {
        self::$staticCallbackWasCalled = true;
        self::$staticCallbackArguments = func_get_args();
    }
}
