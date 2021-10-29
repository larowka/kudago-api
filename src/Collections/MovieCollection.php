<?php

namespace Larowka\KudaGo\Collections;

use Larowka\KudaGo\Resources\Movie;

/**
 * @method static MovieCollection fromArray(array $items)
 * @method Movie[] getIterator()
 * @method Movie first()
 * @method Movie last()
 */
class MovieCollection extends AbstractCollection
{
    public function add(array $data): void
    {
        array_push($this->iterable, Movie::fromArray($data));
    }
}
