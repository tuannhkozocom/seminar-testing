<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_1()
    {
        $this->assertTrue(true);
        $this->assertEmpty(null);
    }

    public function test_2()
    {
        $this->assertTrue(true);
    }
    
    protected function test_3()
    {
        $this->assertFalse(false);
        $this->assertTrue(true);
    }

    public function test_4()
    {
        $this->assertTrue(true);
        $this->assertEmpty(null);
    }
}
