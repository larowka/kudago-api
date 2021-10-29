<?php

namespace Larowka\KudaGo\Methods;

trait HasSort
{
    protected array $orderBy = [];

    public function orderBy(array $fields = [])
    {
        $this->params['order_by'] = empty($fields) ?
            implode(',', array_keys($this->orderBy)) :
            static::arrayToString($fields);

        return $this;
    }
}
