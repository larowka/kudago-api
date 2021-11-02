<?php

namespace Larowka\KudaGo;

use Illuminate\Support\Collection;

use function collect;

class CollectionFactory
{
    public static function make(array $data, string $interface): Collection
    {
        $output = [];

        foreach ($data as $item) {
            if ($resource = $interface::fromArray($item)) {
                $output[$resource->id] = $resource;
            }
        }

        return collect($output);
    }
}
