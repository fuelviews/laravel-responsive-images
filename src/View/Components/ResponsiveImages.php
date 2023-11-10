<?php

namespace Fuelviews\ResponsiveImages\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

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
    private $supportsWebp;

    public function __construct(
        $image,
        $imageWidth = '',
        $imageHeight = '',
        $altText = '',
        $loading = 'lazy'
    ) {
        $this->imageName = $image;
        $this->imageExt = pathinfo($this->imagePath . $this->imageName, PATHINFO_EXTENSION);
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
        $this->altText = $altText;
        $this->loading = $loading;
        $this->imagePath = config('responsive-images.image_path');
        $this->dimensions = config('responsive-images.dimensions');

        // Detect WebP support
        $this->supportsWebp = strpos(Request::header('Accept'), 'image/webp') !== false;
    }

    public function render(): View|Closure|string
    {
        $imageSet = [];

        foreach ($this->dimensions as $dimension) {
            $filename = pathinfo($this->imageName, PATHINFO_FILENAME);
            $extension = $this->supportsWebp ? 'webp' : $this->imageExt;
            $src = asset($this->imagePath . $filename . '-' . $dimension[0] . '.' . $extension);
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
