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

    private const DIMENSIONS = [
        ['xs', 320],
        ['sm', 375],
        ['md', 768],
        ['lg', 1024],
        ['xl', 1500],
        ['2xl', 1501],
    ];

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
    }

    public function render(): View|Closure|string
    {
        $imageSet = [];

        foreach (self::DIMENSIONS as $dimension) {
            $src = '/img/'.$this->imageName.'-'.$dimension[0].'.'.'webp';
            $descriptor = $dimension[1].'w';
            $imageSet[] = "{$src} {$descriptor}";
        }

        $srcset = implode(', ', $imageSet);

        return view('fuelviews::responsive-images', [
            'imgsrc' => '/img/'.$this->imageName.'-'.self::DIMENSIONS[1][0].'.'.$this->imageExt,
            'srcset' => $srcset,
            'altText' => $this->altText,
            'class' => $this->class,
            'imageWidth' => $this->imageWidth,
            'imageHeight' => $this->imageHeight,
            'loading' => $this->loading,
        ]);
    }
}
