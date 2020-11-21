<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use QuickCheck\Generator as Gen;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;

use function Fun\accept_triple;
use function Fun\accept_tuple;

class FunTest extends TestCase
{
    public function test_accept_tuple()
    {
        $add = accept_tuple(fn ($x, $y) => $x + $y);
        $this->markTestIncomplete("Requires implementation");
    }

    public function test_accept_triple()
    {
        $add3 = accept_triple(fn ($x, $y, $z) => $x + $y + $z);
        $this->markTestIncomplete("Requires implementation");
    }
}
