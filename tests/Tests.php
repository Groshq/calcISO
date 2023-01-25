<?php

namespace Tests;

require_once '../lib/Count.php';
require_once '../lib/Operations.php';

use \PHPUnit\Framework\TestCase;
use lib\Count;
use lib\Operations;

class Tests extends TestCase
{
    /**
     * Test jednostkowy : dodawania
     *
     * @void
     */
    public function testAddV1(): void
    {
        $this->assertEquals(20, Operations::addittion(10, 10));
    }

    /**
     * Test jednostkowy : mnozenia
     *
     * @return void
     */
    public function testMultiV1(): void
    {
        $this->assertEquals(100, Operations::multiplication(10, 10));
    }

    /**
     * Test jednostkowy : odejmowania
     *
     * @return void
     */
    public function testSubV1(): void
    {
        $this->assertEquals(0, Operations::subtraction(10, 10));
    }

    /**
     * Test jednostkowy : dzielenia
     *
     * @return void
     */
    public function testDivV1(): void
    {
        $this->assertEquals(1, Operations::division(10, 10));
    }

    /**
     * Test jednostkowy : Potegowania
     *
     * @return void
     */
    public function testPowerV1(): void
    {
        $this->assertEquals(256, Operations::powerade(2, 8));
    }

    /**
     * test pierwiastkowania
     *
     * @return void
     */
    public function testRootV1(): void
    {
        $this->assertEquals(3, Operations::root(2, 9));
    }

    /**
     * Test funkcjonlany : liczenia
     *
     * @return void
     */
    public function testCount(): void
    {
        $this->assertEquals(100, (new Count())->count(10+90*100/100-100+100));
    }
}
