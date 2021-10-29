<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Location fromArray(array $data) Return an instance of Location resource object
 *
 * @property float $lat
 * @property float $lon
 */
class Location extends AbstractResource
{
    public static array $attributes = [
        'lat' => true,
        'lon' => true
    ];
}
