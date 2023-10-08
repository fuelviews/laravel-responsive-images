# laravel-responsiveimages

Post-processed responsive images blade component for Laravel

## 1. Process images

[Process Responsive Images Script](https://github.com/fuelviews/responsiveimages)

## 2. Copy images

Copy processed images into the public/images/ directory

## 3. Install package

```
composer require fuelviews/laravel-responsiveimages
```

## Publish config (optional)

```
php artisan vendor:publish --provider="Fuelviews\ResponsiveImages\ResponsiveImagesServiceProvider" --tag="config"
```

## Publish views (optional)

```
php artisan vendor:publish --provider="Fuelviews\ResponsiveImages\ResponsiveImagesServiceProvider" --tag="views"
```

## Publish tests (optional)

```
php artisan vendor:publish --provider="Fuelviews\ResponsiveImages\ResponsiveImagesServiceProvider" --tag="tests"
```

## Basic usage

```
<x-fuelviews::responsive-images
    image="logo.png"
    class="h-96 w-auto"
/>
```

or

```
<x-fuelviews::responsive-images image="logo.png" class="h-96 w-auto" />
```

### [Fuelviews](https://feulviews.com)
