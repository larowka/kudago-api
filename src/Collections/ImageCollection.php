<?php

namespace Larowka\KudaGo\Collections;

use Larowka\KudaGo\Resources\Image;

/**
 * @method static ImageCollection fromArray(array $items)
 * @method Image[] getIterator()
 * @method Image first()
 * @method Image last()
 */
class ImageCollection extends AbstractCollection
{
    public function add(array $data): void
    {
        array_push($this->iterable, Image::fromArray($data));
    }
}
