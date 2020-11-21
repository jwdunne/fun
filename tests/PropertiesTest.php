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
        $this->markTestIncomplete("Requires implementation");
    }

    public function test_irreflexive()
    {
        ['lt' => $lt] = $this->ops();

        // < is not reflexive
        $this->markTestIncomplete("Requires implementation");
    }

    public function test_symmetric()
    {
        ['eq' => $eq] = $this->ops();

        // = is symmetric
        $this->markTestIncomplete("Requires implementation");
    }

    public function test_antisymmetric()
    {
        ['lt' => $lt, 'neq' => $neq] = $this->ops();

        // < is antisymmetric unless x = y
        $this->markTestIncomplete("Requires implementation");
    }

    public function test_transitive()
    {
        ['eq' => $eq, 'lt' => $lt] = $this->ops();

        // = is transitive
        $this->markTestIncomplete("Requires implementation");


        // <= is transitive
        $lte = fn ($x, $y) => ($eq($x, $y) || $lt($x, $y));
        $this->markTestIncomplete("Requires implementation");
    }
}
