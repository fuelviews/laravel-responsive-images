# laravel-responsiveimages

## Process images

[Process Responsive Images Script](https://github.com/fuelviews/responsiveimages)

## Install package

```
composer require fuelviews/laravel-responsiveimages
```

## Publish config (optional)

```
php composer vendor:publish --provider="FuelViews\LaravelResponsiveImages\ResponsiveImagesServiceProvider" --tag="config"
```

## Publish views (optional)

```
php composer vendor:publish --provider="FuelViews\LaravelResponsiveImages\ResponsiveImagesServiceProvider" --tag="views"
```

## Basic usage

Do not forget double and single quotes `"'$value'"`

```
<x-fuelviews::responsive-images
    :imageName="'logo'"
    :imageExt="'png'"
    :imageWidth="'350'"
    :imageHeight="'167'"
    :loading="'eager'"
    :altText="'Alt text'"
    :class="''"
/>
```