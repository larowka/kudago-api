<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static EventOfTheDay fromArray(array $data) Return an instance of EventOfTheDay resource object
 *
 * @property string $date
 * @property string $location
 * @property Event  $object
 * @property string $title
 */
class EventOfTheDay extends AbstractResource
{
    public static array $attributes = [
        'date'     => true,
        'location' => true,
        'object'   => Event::class,
        'title'    => true
    ];
}