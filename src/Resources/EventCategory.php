<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static EventCategory fromArray(array $data) Return an instance of EventCategory resource object
 *
 * @property int    $id
 * @property string $slug
 * @property string $name
 */
class EventCategory extends AbstractResource
{
    public static array $attributes = [
        'id'   => true,
        'slug' => true,
        'name' => true,
    ];
}
