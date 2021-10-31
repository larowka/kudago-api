<?php

namespace Larowka\KudaGo\Laravel;

use Illuminate\Support\Facades\Facade;
use Larowka\KudaGo\Api;

class KudaGo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Api::class;
    }
}
