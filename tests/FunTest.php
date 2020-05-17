<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function Fun\accept_triple;
use function Fun\accept_tuple;

class FunTest extends TestCase
{
    public function test_accept_tuple()
    {
        $add = accept_tuple(fn ($x, $y) => $x + $y);
        $this->assertEquals(2, $add([1, 1]));
    }

    public function test_accept_triple()
    {
        $add3 = accept_triple(fn ($x, $y, $z) => $x + $y + $z);
        $this->assertEquals(6, $add3([1, 2, 3]));
    }
}
