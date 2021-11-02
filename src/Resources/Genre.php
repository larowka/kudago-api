<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Genre fromArray(array $data) Return an instance of Genre resource object
 *
 * @property int    $id
 * @property string $name
 * @property string $slug
 */
class Genre extends AbstractResource
{
    public static array $attributes = [
        'id'   => true,
        'name' => true,
        'slug' => true
    ];
}
