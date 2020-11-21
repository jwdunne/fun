<?php

namespace Fun\Traits;

use Fun\Types\Ord;

/**
 * Implements the methods to create a totally ordered type.
 *
 * @template T
 */
trait OrdTrait
{
    use EqTrait;

    /**
     * Returns Ord::LT, Ord::GT or Ord::EQ. Must be implemented.
     *
     * @param Ord<T> $x Object in Ord to compare with.
     * @return Ord::LT | Ord::GT | Ord::LT
     */
    abstract public function compare(Ord $x);

    /**
     * True if $this < $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function lt(Ord $x): bool
    {
        return $this->compare($x) === Ord::LT;
    }

    /**
     * True if $this <= $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function lte(Ord $x): bool
    {
        return $this->eq($x) || $this->lt($x);
    }

    /**
     * True if $this > $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function gt(Ord $x): bool
    {
        return $this->compare($x) === Ord::GT;
    }

    /**
     * True if $this >= $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function gte(Ord $x): bool
    {
        return $this->eq($x) || $this->gt($x);
    }

    /**
     * Pick the smaller out of $this or $x.
     *
     * @param Ord<T> $x
     * @return Ord<T>
     */
    public function min(Ord $x): Ord
    {
        return $this->lt($x) ? $this : $x;
    }

    /**
     * Pick the larger out of $this and $x.
     *
     * @param Ord $x
     * @return Ord
     */
    public function max(Ord $x): Ord
    {
        return $this->gt($x) ? $this : $x;
    }
}
