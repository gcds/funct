<?php

namespace Funct\Invoke;

use Funct;
use ArrayAccess;

/**
 * Invoke a method if condition is true
 *
 * @param callable $callable        Callable function
 * @param array    $methodArguments Argument list to pass to the method
 * @param bool     $condition       A condition which if it is true call method
 *
 * @return mixed
 */
function ifCondition(callable $callable, $methodArguments = [], $condition)
{
    if (true === $condition) {
        return call_user_func_array(
            $callable,
            $methodArguments
        );
    }
}


/**ˆ
 * Invoke a method if value isset
 *
 * @param callable          $callable Callable function
 * @param array|ArrayAccess $values   Values
 * @param mixed             $key
 *
 * @return mixed
 */
function ifIsset(callable $callable, $values, $key)
{
    if (isset($values[$key])) {
        return call_user_func(
            $callable,
            $values[$key]
        );
    }
}


/**
 * Invoke a method if value is not empty
 *
 * @param callable $callable Callable function
 * @param mixed    $var
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function ifNotEmpty(callable $callable, $var)
{
    return ifCondition($callable, [$var], Funct\notEmpty($var));
}
