<?php

namespace Larowka\KudaGo\Collections;

abstract class AbstractCollection implements \IteratorAggregate
{
    protected array $iterable = [];

    abstract public function add(array $data): void;

    public static function fromArray(array $items)
    {
        $instance = new static();

        if ($items) {
            foreach ($items as $item) {
                $instance->add($item);
            }
        }

        return $instance;
    }

    public function getIterator(): \Generator
    {
        yield from $this->iterable;
    }

    public function first()
    {
        return $this->iterable[0];
    }

    public function last()
    {
        return array_reverse($this->iterable)[0];
    }
}
