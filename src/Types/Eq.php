<?php

namespace Fun\Types;

/**
 * @psalm-immutable
 */
interface Eq
{
    /**
     * @psalm-pure
     * @param Eq $x
     */
    public function eq($x): bool;
}
