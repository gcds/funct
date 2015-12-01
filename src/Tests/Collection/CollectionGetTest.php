<?php

namespace Funct\Tests\Collection;

use Funct\Collection;

/**
 * Class CollectionGetTest
 *
 * @package Funct\Tests\Collection
 * @author Aurimas Niekis <aurimas@niekis.lt>
*/
class CollectionGetTest extends \PHPUnit_Framework_TestCase
{
    public function testCollectionGetExists()
    {
        $collection = ['a', 'b', 'c'];

        $result = Collection\get($collection, 1);

        $this->assertEquals('b', $result);

        $result = Collection\get($collection, 4);
        $this->assertNull($result);

        $result = Collection\get($collection, 4, 'foobar');
        $this->assertEquals('foobar', $result);
    }
}
