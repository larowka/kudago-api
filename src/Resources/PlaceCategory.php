<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static PlaceCategory fromArray(array $data) Return an instance of PlaceCategory resource object
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 */
class PlaceCategory extends AbstractResource
{
    public static array $attributes = [
        'id' => true,
        'slug' => true,
        'name' => true,
    ];
}