<?php

namespace Funct\CodeBlocks;

use Traversable;

/**
 * @param array|Traversable $collection
 * @param int $n First n elements of array
 *
 * @return array
 */
function collection_first_n($collection, $n = 1)
{
    return array_slice($collection, 0, $n);
}
