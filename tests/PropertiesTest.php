<?php

namespace Tests;

use QuickCheck\Generator as Gen;
use PHPUnit\Framework\TestCase;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;

use function Fun\accept_tuple;
use function Fun\antisymmetric;
use function Fun\irreflexive;
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
            'lt' => fn ($x, $y) => $x > $y,
            'neq' => fn ($x, $y) => $x !== $y
        ];
    }

    public function test_reflexive()
    {
        ['eq' => $eq] = $this->ops();

        // = is reflexive
        $this->assertThat(
            Property::forAll([Gen::ints()], reflexive($eq)),
            PropertyConstraint::check()
        );
    }

    public function test_irreflexive()
    {
        ['lt' => $lt] = $this->ops();

        // < is not reflexive
        $this->assertThat(
            Property::forAll([Gen::ints()], irreflexive($lt)),
            PropertyConstraint::check(100)
        );
    }

    public function test_symmetric()
    {
        ['eq' => $eq] = $this->ops();

        // = is symmetric
        $this->assertThat(
            Property::forAll([Gen::ints(), Gen::ints()], symmetric($eq)),
            PropertyConstraint::check(100)
        );
    }

    public function test_antisymmetric()
    {
        ['lt' => $lt, 'neq' => $neq] = $this->ops();

        // < is antisymmetric unless x = y
        $this->assertThat(
            Property::forAll(
                [
                    Gen::tuples(Gen::ints(), Gen::ints())
                        ->suchThat(accept_tuple($neq)),
                ],
                accept_tuple(antisymmetric($lt))
            ),
            PropertyConstraint::check(100)
        );
    }

    public function test_transitive()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is transitive
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
