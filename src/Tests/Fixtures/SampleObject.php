<?php

namespace Funct\Tests\Fixtures;

/**
 * Class SampleObject
 *
 * @package Funct\Tests\Fixtures
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
class SampleObject
{
    /**
     * @var mixed
     */
    protected $foo;

    /**
     * @var mixed
     */
    protected $bar;

    /**
     * @return mixed
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * @param mixed $foo
     *
     * @return $this
     */
    public function setFoo($foo)
    {
        $this->foo = $foo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * @param mixed $bar
     *
     * @return $this
     */
    public function setBar($bar)
    {
        $this->bar = $bar;

        return $this;
    }
}
