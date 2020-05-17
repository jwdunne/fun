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
        $this->assertThat(
            Property::forAll(
                [Gen::tuples(Gen::ints(), Gen::ints())],
                fn ($xs) => $add($xs) === $xs[0] + $xs[1]
            ),
            PropertyConstraint::check()
        );
    }

    public function test_accept_triple()
    {
        $add3 = accept_triple(fn ($x, $y, $z) => $x + $y + $z);
        $this->assertThat(
            Property::forAll(
                [Gen::tuples(Gen::ints(), Gen::ints(), Gen::ints())],
                fn ($xs) => $add3($xs) === $xs[0] + $xs[1] + $xs[2]
            ),
            PropertyConstraint::check()
        );
    }
}
