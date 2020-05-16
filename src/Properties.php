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
 * Negates a property
 *
 * TODO: I don't like this...
 *
 * @psalm-pure
 * @template T
 * @param callable(...T):bool $op
 * @return callable(...T):bool
 */
function neg($op): callable
{
    return fn (...$args) => !$op(...$args);
}

/**
 * Tests reflexivity of relation R such that `x R x` holds.
 *
 * @psalm-pure
 * @template T
 * @param callable(T, T):bool $op
 * @psalm-return callable(T): bool
 */
function reflexive($op): callable
{
    return fn ($x): bool => $op($x, $x) === true;
}

/**
 * @const callable
 */
const symmetric = '\Fun\symmetric';

/**
 * Tests symmetry of relation R such that `x R y` and `y R x` hold.
 *
 * @template T
 * @param callable(T, T):bool $op
 * @return callable(T, T):bool
 */
function symmetric($op): callable
{
    return fn ($x, $y) => $op($x, $y) === $op($y, $x);
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
 * @param callable(T, T, T):bool $op
 * @return callable(T, T, T):bool
 */
function transitive($op): callable
{
    return fn ($x, $y, $z) => ($op($x, $y) && $op($y, $z)) === $op($x, $z);
}
