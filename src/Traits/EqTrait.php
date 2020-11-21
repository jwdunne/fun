<?php

namespace Fun\Traits;

use Fun\Types\Eq;

/**
 * Trait helper that defines neq in terms of eq.
 *
 * @template T
 */
trait EqTrait
{
    /**
     * True if eq($this, $x). Must be implemented.
     *
     * @param Eq<T> $x The object in Eq to compare with.
     * @return bool
     */
    abstract public function eq(Eq $x): bool;

    /**
     * True if neq($this, $x)
     *
     * @param Eq<T> $x The object in Eq to compare with.
     * @return bool
     */
    public function neq(Eq $x): bool
    {
        return !$this->eq($x);
    }
}
