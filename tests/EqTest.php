<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function Fun\id;

/**
 * Show Eq holds equivalence relation properties i.e:
 *
 * ```php
 * // Reflexivity
 * eq($a, $a) === true
 *
 * // Symmetry
 * eq($a, $b) && eq($b, $a) === true
 *
 * // Transitivity
 * if (eq($a, $b) && eq($b, $c)) eq($a, $c);
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
    }

    /**
     * Test reflexivity
     */
    public function test_eq_reflexivity()
    {
    }

    /**
     * Test symmetry
     */
    public function test_eq_symmetry()
    {
    }

    /**
     * Test transitivity
     */
    public function test_eq_transitivity()
    {
    }
}
