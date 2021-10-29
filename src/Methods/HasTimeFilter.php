<?php

namespace Larowka\KudaGo\Methods;

use Carbon\Carbon;

trait HasTimeFilter
{
    protected string $afterParam = 'actual_since';
    protected string $beforeParam = 'actual_until';

    public function after(string $timestamp)
    {
        $this->params[$this->afterParam] = Carbon::parse($timestamp)->timestamp;
        return $this;
    }

    public function before(string $timestamp)
    {
        $this->params[$this->beforeParam] = Carbon::parse($timestamp)->timestamp;
        return $this;
    }
}
