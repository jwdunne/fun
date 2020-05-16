<?php

namespace Tests;

use QuickCheck\Generator as Gen;
use PHPUnit\Framework\TestCase;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;

use function Fun\reflexive;
use function Fun\symmetric;
use function Fun\transitive;

use const Fun\reflexive;

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
        $this->assertTrue(reflexive($eq, 1));

        $property = Property::forAll(
            [Gen::ints()],
            fn ($x): bool => reflexive($eq, $x)
        );

        $this->assertThat($property, PropertyConstraint::check());

        // < is not reflexive
        $this->assertFalse(reflexive($lt, 1));
    }

    public function test_symmetric()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is symmetric
        $this->assertTrue(symmetric($eq, 1, 2));
        $this->assertTrue(symmetric($eq, 1, 1));

        // < is not symmetric
        $this->assertFalse(symmetric($lt, 1, 2));
    }

    public function test_transitive()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is transitive
        $this->assertTrue(transitive($eq, 1, 2, 3));
        $this->assertTrue(transitive($eq, 1, 2, 3));
        $this->assertTrue(transitive($eq, 1, 1, 1));

        // < is transitive
        $this->assertTrue(transitive($lt, 1, 2, 3));
        $this->assertTrue(transitive($lt, 3, 2, 1));
    }
}
