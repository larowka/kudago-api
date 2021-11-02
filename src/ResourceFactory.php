<?php

namespace Larowka\KudaGo;

use Larowka\KudaGo\Resources\IResource;
use Larowka\KudaGo\Resources\News;
use Larowka\KudaGo\Resources\Place;

class ResourceFactory
{
    public static array $resources = [
        'news'  => News::class,
        //'event' => Event::class,
        'place' => Place::class,
        //'list' => null
    ];

    public static function fromArray(array $data): ?IResource
    {
        if (!$type = $data['ctype'] ?? null) {
            return null;
        }

        if (in_array($type, array_keys(static::$resources))) {
            return static::$resources[$type]::fromArray($data);
        } else {
            return null;
        }
    }
}
