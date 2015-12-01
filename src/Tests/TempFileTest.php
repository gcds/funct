<?php

namespace Funct\Tests;

use Funct as Funct;

/**
 * Class TempFileTest
 *
 * @package Funct\Tests
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class TempFileTest extends \PHPUnit_Framework_TestCase
{
    public function testTempFile()
    {
        $tempFile = Funct\tempFile();

        $this->assertFileExists($tempFile);

        unlink($tempFile);
    }

    public function testTempFileWithPrefix()
    {
        $tempFile = Funct\tempFile('fooBar');

        $filename = basename($tempFile);
        $this->assertStringStartsWith('fooBar', $filename);

        unlink($tempFile);
    }
}
