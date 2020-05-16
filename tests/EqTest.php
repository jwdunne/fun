<?php

namespace Tests;

use Fun\Types\Eq;
use PHPUnit\Framework\TestCase;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;
use QuickCheck\Generator as Gen;

use function Fun\eq;
use function Fun\id;
use function Fun\reflexive;
use function Fun\symmetric;
use function Fun\transitive;

use const Fun\eq;

/**
 * Show Eq holds equivalence relation properties i.e:
 *
 * ```php
 * // Reflexivity
 * eq($a, $a) === true
 *
 * // Symmetry
 * eq($a, $b) === eq($b, $a)
 *
 * // Transitivity
 * eq($a, $b) && eq($b, $c) => eq($a, $c);
 * ```
 */
class EqTest extends TestCase
{
    public function test_id_returns_same_value()
    {
        $this->assertEquals(true, id(true));
    }

    public function eqObj(int $value)
    {
        return new class ($value) implements Eq
        {
            private $value;

            public function __construct(int $value)
            {
                $this->value = $value;
            }

            public function eq($x): bool
            {
                if ($x instanceof self) {
                    return $this->value === $x->value;
                }

                return false;
            }
        };
    }

    private function objGenerator(): Gen
    {
        return Gen::ints()->map([$this, 'eqObj']);
    }

    public function test_eq_tests_equality_on_eq_instances()
    {
        $obj1 = $this->eqObj(1);
        $obj2 = $this->eqObj(2);
        $obj3 = $this->eqObj(1);

        $this->assertTrue(eq($obj1, $obj1));
        $this->assertTrue(eq($obj1, $obj3));
        $this->assertFalse(eq($obj1, $obj2));
    }

    /**
     * Test reflexivity
     */
    public function test_eq_reflexivity()
    {
        $this->assertThat(
            Property::forAll(
                [$this->objGenerator()],
                reflexive(eq)
            ),
            PropertyConstraint::check(100)
        );
    }

    /**
     * Test symmetry
     */
    public function test_eq_symmetry()
    {
        $this->assertThat(
            Property::forAll(
                [
                    $this->objGenerator(),
                    $this->objGenerator(),
                ],
                symmetric(eq)
            ),
            PropertyConstraint::check(100)
        );
    }

    /**
     * Test transitivity
     */
    public function test_eq_transitivity()
    {
        $this->assertThat(
            Property::forAll(
                [
                    $this->objGenerator(),
                    $this->objGenerator(),
                    $this->objGenerator()
                ],
                transitive(eq)
            ),
            PropertyConstraint::check(100)
        );
    }
}
