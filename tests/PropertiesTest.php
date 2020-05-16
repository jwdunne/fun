<?php

namespace Tests;

use QuickCheck\Generator as Gen;
use PHPUnit\Framework\TestCase;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;

use function Fun\neg;
use function Fun\reflexive;
use function Fun\symmetric;
use function Fun\transitive;

/**
 * @package Tests
 */
class PropertiesTest extends TestCase
{
    private function ops(): array
    {
        return [
            'eq' => fn ($x, $y) => $x === $y,
            'lt' => fn ($x, $y) => $x > $y
        ];
    }

    public function test_reflexive()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is reflexive
        $this->assertThat(
            Property::forAll(
                [Gen::ints()],
                reflexive($eq)
            ),
            PropertyConstraint::check()
        );

        // < is not reflexive
        $this->assertThat(
            Property::forAll(
                [Gen::ints()],
                neg(reflexive($lt))
            ),
            PropertyConstraint::check(100)
        );
    }

    public function test_symmetric()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is symmetric
        $this->assertThat(
            Property::forAll(
                [Gen::ints(), Gen::ints()],
                symmetric($eq)
            ),
            PropertyConstraint::check(100)
        );

        // < is not symmetric unless x = y
        $this->assertThat(
            Property::forAll(
                [
                    Gen::tuples(Gen::ints(), Gen::ints())
                        ->suchThat(fn ($xs) => $xs[0] !== $xs[1]),
                ],
                fn ($xs) => neg(symmetric($lt))(...$xs)
            ),
            PropertyConstraint::check(100)
        );
    }

    public function test_transitive()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is transitive
        $this->assertTrue(transitive($lt)(1, 2, 3));
        $this->assertTrue(transitive($lt)(3, 2, 1));

        $this->assertThat(
            Property::forAll(
                [Gen::ints(), Gen::ints(), Gen::ints()],
                transitive($eq)
            ),
            PropertyConstraint::check(100)
        );

        // <= is transitive
        $lte = fn ($x, $y) => ($eq($x, $y) || $lt($x, $y));
        $this->assertThat(
            Property::forAll(
                [Gen::ints(), Gen::ints(), Gen::ints()],
                transitive($lte)
            ),
            PropertyConstraint::check(100)
        );
    }
}
