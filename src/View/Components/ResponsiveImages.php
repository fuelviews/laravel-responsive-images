<?php

namespace Fuelviews\ResponsiveImages\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResponsiveImages extends Component
{
    public $imageName;

    public $imageExt;

    public $imageWidth;

    public $imageHeight;

    public $altText;

    public $loading;

    public $class;

    private $dimensions;

    private $imagePath;

    public function __construct(
        $imageName,
        $imageExt,
        $imageWidth,
        $imageHeight,
        $altText,
        $loading = 'lazy',
        $class = 'w-full'
    ) {
        $this->imageName = $imageName;
        $this->imageExt = $imageExt;
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
        $this->altText = $altText;
        $this->loading = $loading;
        $this->class = $class;
        $this->imagePath = config('responsive-images.image_path');
        $this->dimensions = config('responsive-images.dimensions');
    }

    public function render(): View|Closure|string
    {
        $imageSet = [];

        foreach ($this->dimensions as $dimension) {
            $src = asset($this->imagePath.$this->imageName.'-'.$dimension[0].'.'.'webp');
            $descriptor = $dimension[1].'w';
            $imageSet[] = "{$src} {$descriptor}";
        }

        $srcset = implode(', ', $imageSet);

        return view('fuelviews::responsive-images', [
            'imgsrc' => asset($this->imagePath.$this->imageName.'-'.$this->dimensions[1][0].'.'.$this->imageExt),
            'srcset' => $srcset,
            'altText' => $this->altText,
            'class' => $this->class,
            'imageWidth' => $this->imageWidth,
            'imageHeight' => $this->imageHeight,
            'loading' => $this->loading,
        ]);
    }
}
