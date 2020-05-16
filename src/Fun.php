<?php

namespace Fun;

use Fun\Types\Eq;

/**
 * Identity function
 *
 * @template T
 * @psalm-pure
 * @param T $x
 * @return T
 */
function id($x)
{
    return $x;
}

/**
 * @const callable
 */
const id = '\Fun\id';

/**
 * General equality binary operator.
 *
 * Supports instances of type Eq as well as scalars
 * and arrays.
 *
 * @psalm-type Equal=scalar|array|Eq
 * @psalm-pure
 * @param Equal $a
 * @param Equal $b
 * @return bool
 */
function eq($a, $b)
{
    if ($a instanceof Eq && $b instanceof Eq) {
        return $a->eq($b);
    }

    return $a === $b;
}
