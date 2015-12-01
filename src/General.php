<?php

namespace Funct;

/**
 * Checks if the given key or index exists in the array
 *
 *
 * @param mixed $key
 * @param array $array
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function arrayKeyNotExists($key, array $array)
{
    return false === array_key_exists($key, $array);
}


/**
 * Returns true if value is false
 *
 * @param mixed $value
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function false($value)
{
    return false === $value;
}


/**
 * Returns a first non null value from function arguments
 *
 * @param mixed $valueA
 *
 * @return mixed
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function firstValue($valueA)
{
    foreach (func_get_args() as $arg) {
        if (null !== $arg) {
            return $arg;
        }
    }
}


/**
 * Returns a first not empty value from function arguments
 *
 * @param mixed $valueA
 * @param mixed $valueB
 *
 * @return mixed
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function firstValueNotEmpty($valueA, $valueB)
{
    foreach (func_get_args() as $arg) {
        if (notEmpty($arg)) {
            return $arg;
        }
    }
}


/**
 * Returns true if var is not empty
 *
 * @param mixed $value
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function notEmpty($value)
{
    return false === empty($value);
}


/**
 * Checks if needle is not in array
 *
 * @param      $needle
 * @param      $haystack
 * @param null $strict
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function notInArray($needle, $haystack, $strict = null)
{
    return false === in_array($needle, $haystack, $strict);
}


/**
 * Returns true if var is not null
 *
 * @param mixed $value
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function notNull($value)
{
    return null !== $value;
}


/**
 * Returns true if value is null
 *
 * @param mixed $value
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function null($value)
{
    return null === $value;
}


/**
 * Generates temp file on systems temp folder with prefix
 *
 * @param string $prefix
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function tempFile($prefix = 'php')
{
    return tempnam(sys_get_temp_dir(), $prefix);
}


/**
 * Returns true if value is true
 *
 * @param mixed $value
 *
 * @return bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function true($value)
{
    return true === $value;
}
