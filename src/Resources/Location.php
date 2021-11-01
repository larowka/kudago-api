<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Location fromArray(array $data) Return an instance of Location resource object
 *
 * @property string $slug
 * @property string $name
 * @property string $timezone
 * @property Coords $coords
 * @property string $language
 * @property string $currency
 */
class Location extends AbstractResource
{
    public static array $attributes = [
        'slug'     => true,
        'name'     => true,
        'timezone' => true,
        'coords'   => Coords::class,
        'language' => true,
        'currency' => true,
    ];
}