<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Coords fromArray(array $data) Return an instance of Coords resource object
 *
 * @property float $lat
 * @property float $lon
 */
class Coords extends AbstractResource
{
    public static array $attributes = [
        'lat' => true,
        'lon' => true
    ];
}
