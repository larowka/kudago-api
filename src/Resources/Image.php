<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Image fromArray(array $data) Return an instance of Image resource object
 *
 * @property string $image
 * @property ImageSource $source
 */
class Image extends AbstractResource
{
    public static array $attributes = [
        'image'  => true,
        'source' => ImageSource::class
    ];
}
