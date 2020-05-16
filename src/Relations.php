<?php

namespace Fun;

use Fun\Types\Eq;

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
const eq = '\Fun\eq';

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
    if ($a instanceof Eq && $b instanceof Eq) {
        return $a->neq($b);
    }

    return $a !== $b;
}

const neq = '\Fun\neq';
