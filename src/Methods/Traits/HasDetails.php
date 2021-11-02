<?php

namespace Larowka\KudaGo\Methods\Traits;

trait HasDetails
{
    protected array $expand;

    public function expand(string ...$fields): self
    {
        $this->params['expand'] = empty($fields) ?
            implode(',', array_keys($this->expand)) :
            static::arrayToString($fields);

        return $this;
    }
}
