<?php

namespace Tests;

use Fun\Types\Eq;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;
use QuickCheck\Generator as Gen;

use function Fun\eq;
use function Fun\neq;
use function Fun\id;
use function Fun\irreflexive;
use function Fun\reflexive;
use function Fun\symmetric;
use function Fun\transitive;

use const Fun\eq;
use const Fun\neq;

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

    public function test_eq_tests_equality_on_eq_instances()
    {
        $obj1 = $this->eqObj(1);
        $obj2 = $this->eqObj(2);
        $obj3 = $this->eqObj(1);

        $this->assertTrue(eq($obj1, $obj1));
        $this->assertTrue(eq($obj1, $obj3));
        $this->assertFalse(eq($obj1, $obj2));
    }

    public function test_neq_tests_non_equality_on_eq_instances()
    {
        $obj1 = $this->eqObj(1);
        $obj2 = $this->eqObj(2);
        $obj3 = $this->eqObj(1);

        $this->assertFalse(neq($obj1, $obj1));
        $this->assertFalse(neq($obj1, $obj3));
        $this->assertTrue(neq($obj1, $obj2));
    }

    /**
     * Test reflexivity of eq
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
     * Test reflexivity of neq
     */
    public function test_neq_irreflexivity()
    {
        $prop = irreflexive(neq);
        $this->assertTrue($prop(0, 0));
        $this->assertTrue($prop(
            $this->eqObj(1),
            $this->eqObj(1)
        ));
    }

    /**
     * Test symmetry of eq
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
     * Test transitivity of eq
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
                if ($x instanceof static) {
                    return $this->value === $x->value;
                }

                return false;
            }

            public function neq($x): bool
            {
                return !$this->eq($x);
            }
        };
    }

    private function objGenerator(): Gen
    {
        return Gen::ints()->map([$this, 'eqObj']);
    }
}
