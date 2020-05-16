<?php

/**
 * A set of useful properties for verifying operations and relations.
 *
 * It's important to remember that these test a property and return true if the
 * property holds. For example, if R is a binary relation with property P over
 * any two sets X, Y, then P(R, x in X, y in Y) regardless of R(x, y).
 */

namespace Fun;

/**
 * @const callable
 */
const reflexive = '\Fun\reflexive';

/**
 */

/**
 * Tests reflexivity of relation R such that `x R x` holds.
 *
 * @psalm-pure
 * @template T
 * @param callable(T, T):bool $op
 * @param T $x
 * @return bool
 */
function reflexive($op, $x): bool
{
    return $op($x, $x) === true;
}

/**
 * @const callable
 */
const symmetric = '\Fun\symmetric';

/**
 * Tests symmetry of relation R such that `x R y` and `y R x` hold.
 *
 * @template T
 * @param callable(T, T):bool $op,
 * @param T $x
 * @param T $y
 */
function symmetric($op, $x, $y): bool
{
    return $op($x, $y) === $op($y, $x);
}

/**
 * @const callable
 */
const transitive = '\Fun\transitive';

/**
 * Tests transitivity of relation R
 *
 * I.e if `x R y` and `y R z`, then `x R z`
 *
 * @template T
 * @param callable(T, T):bool $op
 * @param T $x
 * @param T $y
 * @param T $z
 * @return bool
 */
function transitive($op, $x, $y, $z): bool
{
    return ($op($x, $y) && $op($y, $z)) === $op($x, $z);
}
