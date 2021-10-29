<?php

namespace Larowka\KudaGo\Resources;

abstract class AbstractResource implements IResource
{
    use HasAttributes;

    public static function fromArray(array $data): self
    {
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    private function map(array $data): void
    {
        foreach (static::$attributes as $key => $item) {
            if (isset($data[$key])) {
                if ($item === true) {
                    $this->$key = $data[$key];
                } else {
                    $this->$key = $item::fromArray($data[$key]);
                }
            }
        }
    }
}
