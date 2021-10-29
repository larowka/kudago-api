<?php

namespace Larowka\KudaGo\Collections;

use Larowka\KudaGo\Resources\Showing;

/**
 * @method static ShowingCollection fromArray(array $items)
 * @method Showing[] getIterator()
 * @method Showing first()
 * @method Showing last()
 */
class ShowingCollection extends AbstractCollection
{
    public function add(array $data): void
    {
        array_push($this->iterable, Showing::fromArray($data));
    }
}
