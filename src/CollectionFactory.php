<?php

namespace Larowka\KudaGo;

use Illuminate\Support\Collection;

use function collect;

class CollectionFactory
{
    public static function make(array $data, string $resource): Collection
    {
        $output = [];

        foreach ($data as $item) {
            $resource = $resource::fromArray($item);
            $output[$resource->id] = $resource;
        }

        return collect($output);
    }
}
