<?php

namespace Tests\Feature;

use Fuelviews\ResponsiveImages\View\Components\ResponsiveImages;
use Tests\TestCase;

class ResponsiveImagesTest extends TestCase
{
    /** @test */
    public function it_renders_correctly()
    {
        // Arrange
        $component = new ResponsiveImages(
            'testImage', // imageName
            'jpg', // imageExt
            800, // imageWidth
            600, // imageHeight
            'Test alt text', // altText
            'lazy', // loading
            'w-full' // class
        );

        // Act
        $view = $component->render();

        // Assert
        $this->assertStringContainsString('testImage', $view->render());
    }
}