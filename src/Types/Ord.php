<?php

namespace Fun\Types;

/**
 * @template T
 * @psalm-immutable
 * @package Fun\Types
 */
interface Ord extends Eq
{
    public const LT = -1;
    public const GT = 1;
    public const EQ = 0;

    /**
     * Returns static::LT, static::GT or static::EQ
     *
     * @param Ord<T> $x
     * @return Ord::LT | Ord::GT | Ord::EQ
     */
    public function compare(Ord $x);

    /**
     * True if $this < $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function lt($x): bool;

    /**
     * True if $this <= $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function lte($x): bool;

    /**
     * True if $this > $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function gt($x): bool;

    /**
     * True if $this >= $x.
     *
     * @param Ord<T> $x
     * @return bool
     */
    public function gte($x): bool;

    /**
     * Takes $x of type Ord<T> and returns the smaller of $this or $x.
     *
     * @param Ord<T> $x
     * @return Ord<T>
     */
    public function min($x): Ord;

    /**
     * Takes $x of type T and returns the larger of $this or $x.
     *
     * @param Ord<T> $x
     * @return Ord<T>
     */
    public function max($x): Ord;
}
