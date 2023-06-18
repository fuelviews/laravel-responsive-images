<?php

namespace Fuelviews\ResponsiveImages\Tests;

use PHPUnit\Framework\TestCase;
use Fuelviews\ResponsiveImages\YourClass;

class YourClassTest extends TestCase
{
    /** @test */
    public function it_does_something()
    {
        // Arrange
        $yourClass = new YourClass();

        // Act
        $result = $yourClass->yourMethod();

        // Assert
        $this->assertEquals('expected result', $result);
    }
}
