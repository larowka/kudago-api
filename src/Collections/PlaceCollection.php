<?php

namespace Larowka\KudaGo\Collections;

use Larowka\KudaGo\Resources\Place;

/**
 * @method static PlaceCollection fromArray(array $items)
 * @method Place[] getIterator()
 * @method Place first()
 * @method Place last()
 */
class PlaceCollection extends AbstractCollection
{
    public function add(array $data): void
    {
        array_push($this->iterable, Place::fromArray($data));
    }
}
