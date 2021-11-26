<?php

namespace Larowka\KudaGo\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Larowka\KudaGo\CollectionFactory;
use Larowka\KudaGo\Resources\Traits\HasAttributes;

abstract class AbstractResource implements IResource, Arrayable
{
    use HasAttributes;

    public static function fromArray(array $data): self
    {
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function toArray(): array
    {
        $result = [];
        foreach (static::$attributes as $key => $item) {
            if ($value = isset($this->$key) ? $this->$key : false) {
                if ($item === true) {
                    $result[$key] = $value;
                } elseif (is_array($item)) {
                    $collection = [];
                    foreach ($value as $resource) {
                        $collection = $resource->toArray();
                    }
                    $result[$key] = $collection;
                } else {
                    $result[$key] = $value->toArray();
                }
            }
        }

        return $result;
    }

    private function map(array $data): void
    {
        foreach (static::$attributes as $key => $item) {
            if (isset($data[$key])) {
                if ($item === true) {
                    $this->$key = $data[$key];
                } elseif (is_array($item)) {
                    $this->$key = CollectionFactory::make($data[$key], $item[0]);
                } else {
                    $this->$key = $item::fromArray($data[$key]);
                }
            }
        }
    }
}
