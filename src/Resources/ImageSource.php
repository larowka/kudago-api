<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static ImageSource fromArray(array $data) Return an instance of ImageSource resource object
 *
 * @property string $name
 * @property string $link
 */
class ImageSource extends AbstractResource
{
    public static array $attributes = [
        'name' => true,
        'link' => true
    ];
}
