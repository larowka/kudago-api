<?php

namespace Larowka\KudaGo\Methods\Traits;

trait HasSort
{
    protected array $orderBy = [];

    public function orderBy(string ...$fields): self
    {
        $this->params['order_by'] = empty($fields) ?
            implode(',', array_keys($this->orderBy)) :
            static::arrayToString($fields);

        return $this;
    }
}
