<?php

namespace Larowka\KudaGo\Collections;

use Larowka\KudaGo\Resources\Genre;

/**
 * @method static GenreCollection fromArray(array $items)
 * @method Genre[] getIterator()
 * @method Genre first()
 * @method Genre last()
 */
class GenreCollection extends AbstractCollection
{
    public function add(array $data): void
    {
        array_push($this->iterable, Genre::fromArray($data));
    }
}
