<?php

namespace Funct\Tests\Invoke;

use Funct\Invoke;
use Funct\Tests\Fixtures\SampleObject;;

/**
 * Class InvokeIfNotEmptyTest
 *
 * @package Funct\Tests\Invoke
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class InvokeIfNotEmptyTest extends \PHPUnit_Framework_TestCase
{
    public function testInvokeIfNotEmpty()
    {
        $sampleObject = new SampleObject();

        $value = '';
        Invoke\ifNotEmpty([$sampleObject, 'setFoo'], $value);

        $this->assertNull($sampleObject->getFoo());

        $value = 'foo';
        Invoke\ifNotEmpty([$sampleObject, 'setFoo'], $value);

        $this->assertEquals($value, $sampleObject->getFoo());
    }
}
