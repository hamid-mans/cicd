<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    public function testAddReturnsCorrectSum(): void
    {
        $calculator = new Calculator();
        $result = $calculator->add(2.5, 3.5);

        $this->assertEquals(6.0, $result);
    }
}