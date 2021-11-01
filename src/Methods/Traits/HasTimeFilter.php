<?php

namespace Larowka\KudaGo\Methods\Traits;

use Carbon\Carbon;

trait HasTimeFilter
{
    protected string $afterParam = 'actual_since';
    protected string $beforeParam = 'actual_until';

    public function after(string $timestamp): self
    {
        $this->params[$this->afterParam] = Carbon::parse($timestamp)->timestamp;
        return $this;
    }

    public function before(string $timestamp): self
    {
        $this->params[$this->beforeParam] = Carbon::parse($timestamp)->timestamp;
        return $this;
    }
}
