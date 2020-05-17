<?php

declare(strict_types=1);

namespace Fun\Types;

/**
 * @template T
 * @psalm-immutable
 * @package Fun\Types
 */
interface Eq
{
    /**
     * @psalm-pure
     * @param Eq<T> $x
     * @return bool
     */
    public function eq($x): bool;

    /**
     * @psalm-pure
     * @param Eq<T> $x
     * @return bool
     */
    public function neq($x): bool;
}
