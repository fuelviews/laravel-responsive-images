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

Do not forget double and single quotes `"'$value'"`

```
<x-fuelviews::responsive-images
    :imageName="'logo'"
    :imageExt="'png'"
    :imageWidth="'350'"
    :imageHeight="'167'"
    :loading="''"
    :altText="''"
    :class="''"
/>
```

### [Fuelviews](https://feulviews.com)
