<?php

/**
 * Fun functional programming utility belt.
 *
 * @package Fun
 */

declare(strict_types=1);

namespace Fun;

/**
 * @const callable
 */
const id = '\Fun\id';

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
const accept_tuple = '\Fun\accept_tuple';

/**
 * Take a binary function and return a unary function accepting a tuple.
 *
 * @template T
 * @template U
 * @template V
 * @param callable(T, U): V $op
 * @return callable(array{0: T, 1: U}): V
 */
function accept_tuple(callable $op): callable
{
    return function (array $tuple) use ($op) {
        [$x, $y] = $tuple;
        return $op($x, $y);
    };
}

/**
 * @const callable
 */
const accept_triple = '\Fun\accept_triple';

/**
 * Take a 3-ary function and return a unary function accepting a triple.
 *
 * @template T
 * @template U
 * @template V
 * @template W
 * @param callable(T, U, V): W $op
 * @return callable(array{0: T, 1: U, 2: V}): W
 */
function accept_triple(callable $op): callable
{
    return function (array $triple) use ($op) {
        [$x, $y, $z] = $triple;
        return $op($x, $y, $z);
    };
}
