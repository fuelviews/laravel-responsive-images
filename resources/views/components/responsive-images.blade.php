<img
    src="{{ $imgsrc }}"
    srcset="{{ $srcset }}"
    {{ $attributes->merge([
        'alt' => $altText,
        'loading' => $loading,
        'width' => $imageWidth,
        'height' => $imageHeight
        ]) }}
>
{{ $slot }}
