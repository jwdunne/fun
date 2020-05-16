<?php

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
 * Take two functions $x and $y and return ($x . $y)
 *
 * @param mixed $x
 * @param mixed $y
 * @return void
 */
function compose($x, $y)
{
    return fn (...$args) => $x($y(...$args));
}
