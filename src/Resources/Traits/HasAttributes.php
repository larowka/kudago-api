<?php

namespace Larowka\KudaGo\Resources\Traits;

trait HasAttributes
{
    public static array $attributes = [];

    public function __get(string $key)
    {
        if (array_key_exists($key, static::$attributes)) {
            return $this->$key;
        }

        return null;
    }

    public function __set(string $key, $value)
    {
        if (array_key_exists($key, static::$attributes)) {
            $this->$key = $value;
        }
    }
}
