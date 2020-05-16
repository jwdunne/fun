<?php

namespace Fun;

use Fun\Types\Eq;

/**
 * @const callable
 */
const eq = '\Fun\eq';

/**
 * General equality binary relation.
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

/**
 * @const callable
 */
const neq = '\Fun\neq';

/**
 * Negation of eq.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return bool
 */
function neq($a, $b)
{
    return !eq($a, $b);
}
