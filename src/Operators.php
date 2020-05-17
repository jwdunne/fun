<?php

declare(strict_types=1);

/**
 * A collection of useful, generic binary relations.
 *
 * You can use both function and constant. You can use the constant form to
 * conveniently pass the function as a value.
 *
 * @package Fun
 */

namespace Fun;

use Fun\Types\Eq;
use Fun\Types\Ord;

/**
 * @const callable
 */
const eq = '\Fun\eq';

/**
 * General equality binary relation.
 *
 * Supports instances of type Eq as well as scalars and arrays.
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

/**
 * @const callable
 */
const lt = '\Fun\lt';

/**
 * Less-than binary relation.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return bool
 */
function lt($a, $b): bool
{
    return $a < $b;
}

/**
 * @const callable
 */
const lte = '\Fun\lte';

/**
 * Less-than-or-equal to binary relation.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return bool
 */
function lte($a, $b): bool
{

    return eq($a, $b) || lt($a, $b);
}

/**
 * @const callable
 */
const gt = '\Fun\gt';

/**
 * Greater-than binary relation.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return bool
 */
function gt($a, $b): bool
{
    return $a > $b;
}

/**
 * @const callable
 */
const gte = '\Fun\gte';

/**
 * Greater-than-or-equal-to binary relation.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return bool
 */
function gte($a, $b): bool
{
    return eq($a, $b) || gt($a, $b);
}

/**
 * @const callable
 */
const min = '\Fun\min';

/**
 * Takes arguments $a, $b and returns the minimum of the two.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return T
 */
function min($a, $b)
{
    return lt($a, $b) ? $a : $b;
}

/**
 * @const callable
 */
const max = '\Fun\max';

/**
 * Takes arguments $a, $b and returns the maximum of the two.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return T
 */
function max($a, $b)
{
    return gt($a, $b) ? $a : $b;
}

/**
 * @const callable
 */
const compare = '\Fun\compare';

/**
 * Takes argument $a, $b and returns Ord::GT, Ord::LT or Ord::EQ.
 *
 * @template T
 * @psalm-pure
 * @param T $a
 * @param T $b
 * @return Ord::GT | Ord::LT | Ord::EQ
 */
function compare($a, $b)
{
    if (eq($a, $b)) {
        return Ord::GT;
    }

    return lt($a, $b) ? Ord::LT : Ord::GT;
}
