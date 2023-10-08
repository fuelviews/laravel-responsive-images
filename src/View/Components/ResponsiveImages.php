<?php

namespace Fuelviews\ResponsiveImages\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResponsiveImages extends Component
{
    public $imageName;

    private $imageExt;

    public $imageWidth;

    public $imageHeight;

    public $altText;

    public $loading;

    public $class;

    private $dimensions;

    private $imagePath;

    public function __construct(
        $image,
        $imageWidth = '300',
        $imageHeight = '200',
        $altText = 'Alt text',
        $loading = 'lazy',
    ) {
        $this->imageName = $image;
        $this->imageExt = pathinfo($this->imagePath . $this->imageName, PATHINFO_EXTENSION);
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
        $this->altText = $altText;
        $this->loading = $loading;
        $this->imagePath = config('responsive-images.image_path');
        $this->dimensions = config('responsive-images.dimensions');
    }

    public function render(): View|Closure|string
    {
        $imageSet = [];

        foreach ($this->dimensions as $dimension) {
            $src = asset($this->imagePath . pathinfo($this->imageName, PATHINFO_FILENAME) . '-' . $dimension[0] . '.webp');
            $descriptor = $dimension[1].'w';
            $imageSet[] = "{$src} {$descriptor}";
        }

        $srcset = implode(', ', $imageSet);

        return view('fuelviews::responsive-images', [
            'imgsrc' => asset($this->imagePath . pathinfo($this->imageName, PATHINFO_FILENAME) . '-' . $this->dimensions[1][0] . '.' . $this->imageExt),
            'srcset' => $srcset,
            'altText' => $this->altText,
            'imageWidth' => $this->imageWidth,
            'imageHeight' => $this->imageHeight,
            'loading' => $this->loading,
        ]);
    }
}
