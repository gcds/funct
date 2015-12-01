<?php

namespace Funct\Collection;

use Traversable;

/**
 * Returns a copy of the array with all falsy values removed
 *
 * @param array $collection
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function compact($collection)
{
    return array_filter($collection);
}


/**
 * Sorts a array into groups and returns a count for the number of objects in each group. Similar to groupBy, but
 * instead of returning a array of values, returns a count for the number of values in that group.
 *
 * @param array           $collection
 * @param callable|string $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function countBy($collection, $callback)
{
    $result = [];

    foreach ($collection as $key => $value) {
        if (is_callable($callback)) {
            $groupName = call_user_func($callback, $value);
        } else {
            $groupName = $value[$callback];
        }

        $result[$groupName] = get($result, $groupName, 0);
        $result[$groupName]++;
    }

    return $result;
}


/**
 * Returns true if all of the values in the array pass the callback truth test.
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return bool
 */
function every($collection, callable $callback = null)
{
    if (null === $callback) {
        $callback = function ($item) use ($callback) {
            return (true == $item);
        };
    }

    return count(
               array_filter(
                   $collection,
                   function ($item) use ($callback) {
                       return false === call_user_func($callback, $item);
                   }
               )
           ) < 1;
}


/**
 * Looks through the array and returns the first value that matches all of the key-value pairs listed in properties.
 *
 * @param array $collection
 * @param array $value
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function findWhere($collection, $value)
{
    foreach ($collection as $key => $item) {
        $diff = array_diff_assoc($value, $item);

        if (count($diff) < 1) {
            return $item;
        }
    }
}


/**
 * @param array|Traversable $collection
 *
 * @return array
 */
function first($collection)
{
    return reset($collection);
}


/**
 * @param array|Traversable $collection
 * @param int               $n First n elements of array
 *
 * @return array
 */
function firstN($collection, $n = 1)
{
    return array_slice($collection, 0, $n);
}


/**
 * Flattens a nested array by depth.
 *
 * @param array $collection
 * @param int   $depth
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function flatten($collection, $depth = 1)
{
    $result = [];

    foreach ($collection as $value) {
        if (is_array($value) && $depth > 0) {
            $result = array_merge($result, flatten($value, --$depth));
        } else {
            $result[] = $value;
        }
    }

    return $result;
}


/**
 * Flattens all arrays to single level
 *
 * @param array $collection
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function flattenAll($collection)
{
    $result = [];

    foreach ($collection as $value) {
        if (is_array($value)) {
            $result = array_merge($result, flattenAll($value));
        } else {
            $result[] = $value;
        }
    }

    return $result;
}


/**
 * Runs a callback for every value in collection with value as first argument and additional arguments and returns
 * array of results
 *
 * @param array|Traversable $collection
 * @param callable          $callable
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function forEvery($collection, $callable)
{
    return call_user_func_array('Funct\\Collection\\invoke', func_get_args());
}


/**
 * Returns item from collection if exists otherwise null or default value
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 *
 * @param array|Traversable $collection
 * @param string            $key
 * @param mixed             $default
 *
 * @return mixed
 */
function get($collection, $key, $default = null)
{
    if (isset($collection[$key])) {
        return $collection[$key];
    } else {
        return $default;
    }
}


/**
 * Splits a collection into sets, grouped by the result of running each value through callback. If callback is a string
 * instead of a function, groups by the property named by callback on each of the values.
 *
 * @param array           $collection
 * @param callable|string $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function groupBy($collection, $callback)
{
    $result = [];

    foreach ($collection as $key => $value) {
        if (is_callable($callback)) {
            $groupName = call_user_func($callback, $value);
        } else {
            $groupName = $value[$callback];
        }

        $result[$groupName]       = get($result, $groupName, []);
        $result[$groupName][$key] = $value;
    }

    return $result;
}


/**
 * Returns everything but the last entry of the array. Especially useful on the arguments object. Pass n to exclude the
 * last n elements from the result.
 *
 * @param array $collection
 * @param int   $n
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function initial($collection, $n = 1)
{
    return array_slice($collection, 0, -$n);
}


/**
 * Computes the list of values that are the intersection of all the arrays. Each value in the result is present in each
 * of the arrays.
 *
 * @param array $collectionFirst
 * @param array $collectionSecond
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function intersection($collectionFirst, $collectionSecond)
{
    return call_user_func_array('array_intersect', func_get_args());
}


/**
 * Invokes callback on each value in the list. Any extra arguments passed will be forwarded on to the method invocation.
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function invoke($collection, callable $callback)
{
    $arguments = func_get_args();

    return array_map(
        function ($item) use ($callback, $arguments) {
            $arguments = array_merge([$item], array_slice($arguments, 2));

            return call_user_func_array($callback, $arguments);
        },
        $collection
    );
}


/**
 * Returns last element of array
 *
 * @param array|Traversable $collection
 *
 * @return array
 */
function last($collection)
{
    return end($collection);
}


/**
 * Returns the index of the last occurrence of value in the array, or false if value is not present
 *
 * @param array $collection
 * @param mixed $value
 *
 * @return int|bool
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function lastIndexOf($collection, $value)
{
    $result = array_keys($collection, $value);

    if (count($result) < 1) {
        return false;
    }

    return end($result);
}


/**
 * Returns the last element of an array. Passing n will return the last n elements of the array.
 *
 * @param array|Traversable $collection
 * @param int               $n Last n elements of array
 *
 * @return array
 */
function lastN($collection, $n = 1)
{
    return array_slice($collection, (-1 * $n));
}


/**
 * Returns the maximum value in collection using callback method
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function maxValue($collection, callable $callback)
{
    $values = array_map($callback, $collection);
    $keys   = array_flip($values);

    return $collection[$keys[max($values)]];
}


/**
 * Merges all arrays to first array
 *
 * @param array|Traversable $a
 * @param array|Traversable $b
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function merge(&$a, $b)
{
    $a = call_user_func_array('array_merge', func_get_args());
}


/**
 * Returns the minimum value in collection using callback method
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function minValue($collection, callable $callback)
{
    $values = array_map($callback, $collection);
    $keys   = array_flip($values);

    return $collection[$keys[min($values)]];
}


/**
 * Convert an array into a list of [key, value] pairs.
 *
 * @param array $collection
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function pairs($collection)
{
    return array_map(
        function ($key, $value) {
            return [$key, $value];
        },
        array_keys($collection),
        $collection
    );
}


/**
 * Split array into two arrays: one whose elements all satisfy callback and one whose elements all do not satisfy
 * callback.
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function partition($collection, callable $callback)
{
    $resultA = [];
    $resultB = [];

    foreach ($collection as $key => $value) {
        if (call_user_func($callback, $value, $key)) {
            $resultA[$key] = $value;
        } else {
            $resultB[$key] = $value;
        }
    }

    return [$resultA, $resultB];
}


/**
 * Extract single property from array of arrays
 *
 * @param array  $collection
 * @param string $key
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function pluck($collection, $key)
{
    return array_map(
        function ($item) use ($key) {
            return get($item, $key);
        },
        $collection
    );
}


/**
 * Returns the values in array without the elements that the truth test callback passes. The opposite of array_filter.
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function reject($collection, callable $callback)
{
    return array_filter($collection, function ($item) use ($callback) {
        return false === call_user_func($callback, $item);
    });
}


/**
 * Returns the rest of the elements in an array. Pass an from to return the values of the array from that index onward.
 *
 * @param array $collection
 * @param int   $from
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function rest($collection, $from = 1)
{
    return array_slice($collection, $from);
}


/**
 * Returns true if any of the values in the array pass the callback truth test.
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 *
 * @param array    $collection
 * @param callable $callback
 *
 * @return bool
 */
function some($collection, callable $callback = null)
{
    if (null === $callback) {
        $callback = function ($item) use ($callback) {
            return (true == $item);
        };
    }

    return count(array_filter($collection, $callback)) > 0;
}


/**
 * Returns a sorted array by callback function which should return value to which sort
 *
 * @param array           $collection
 * @param callable|string $sortBy
 * @param string          $sortFunction
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function sortBy($collection, $sortBy, $sortFunction = 'asort')
{
    if (false === is_callable($sortBy)) {
        $sortBy = function ($item) use ($sortBy) {
            return $item[$sortBy];
        };
    }

    $values = array_map($sortBy, $collection);
    $sortFunction($values);

    $result = [];
    foreach ($values as $key => $value) {
        $result[$key] = $collection[$key];
    }

    return $result;
}


/**
 * @see    collection_rest
 *
 * @param array $collection
 * @param int   $from
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function tail($collection, $from = 1)
{
    return rest($collection, $from);
}


/**
 * Computes the union of the passed-in arrays: the list of unique items, in order, that are present in one or more of
 * the arrays.
 *
 * @param array $collectionFirst
 * @param array $collectionSecond
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function union($collectionFirst, $collectionSecond)
{
    $result = call_user_func_array('array_merge', func_get_args());

    return array_unique($result);
}


/**
 * The opposite of zip. Given a number of arrays, returns a series of new arrays, the first of which contains all of
 * the first elements in the input arrays, the second of which contains all of the second elements, and so on.
 *
 * @param array $collection
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function unzip($collection)
{
    $length = count(max($collection, 'count'));
    $result = [];

    for ($i = 0; $i < $length; $i++) {
        $result[$i] = pluck($collection, $i);
    }

    return $result;
}


/**
 * Looks through each value in the array, returning an array of all the values that contain all of the key-value pairs
 * listed in properties.
 *
 * @param array $collection
 * @param array $value
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function where($collection, $value)
{
    $result = [];

    foreach ($collection as $key => $item) {
        $diff = array_diff_assoc($value, $item);

        if (count($diff) < 1) {
            $result[$key] = $item;
        }
    }

    return $result;
}


/**
 * Returns a copy of the array with all instances of the values removed.
 *
 *
 * @param array $collection
 * @param array $without
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function without($collection, $without)
{
    $without = func_get_args();
    array_shift($without);

    return array_diff($collection, $without);
}


/**
 * Merges together the values of each of the arrays with the values at the corresponding position.
 *
 * @param array $collectionFirst
 * @param array $collectionSecond
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function zip($collectionFirst, $collectionSecond)
{
    return unzip(func_get_args());
}
