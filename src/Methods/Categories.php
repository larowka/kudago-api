<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\CollectionFactory;
use Larowka\KudaGo\Resources\{PlaceCategory, EventCategory};

class Categories extends AbstractMethod
{
    public function events(): self
    {
        $this->resource = EventCategory::class;
        $this->base = 'event-categories';
        return $this;
    }

    public function places(): self
    {
        $this->resource = PlaceCategory::class;
        $this->base = 'place-categories';
        return $this;
    }

    public function get(): Collection
    {
        try {
            if ($data = $this->response() ?? false) {
                return CollectionFactory::make($data, $this->resource);
            }
        } catch (GuzzleException $e) {
            // placeholder for $config[exceptions]
        }

        return new Collection();
    }

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(PlaceCategory::$attributes));
        $this->resource = EventCategory::class;
        $this->base = 'event-categories';
    }
}
