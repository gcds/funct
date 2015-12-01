<?php

namespace Funct\Tests\Invoke;

use Funct\Invoke;
use Funct\Tests\Fixtures\SampleObject;;

/**
 * Class InvokeIfIssetTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <${AUTHOR}>
 */
class InvokeIfIssetTest extends \PHPUnit_Framework_TestCase
{
    public function testInvokeIf()
    {
        $sampleObject = new SampleObject();

        $values = [];
        Invoke\ifIsset([$sampleObject, 'setFoo'], $values, 'bar');

        $this->assertNull($sampleObject->getFoo());

        $values = ['bar' => 'foo'];
        Invoke\ifIsset([$sampleObject, 'setFoo'], $values, 'bar');

        $this->assertEquals($values['bar'], $sampleObject->getFoo());
    }
}
