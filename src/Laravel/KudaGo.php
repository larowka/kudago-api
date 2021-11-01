<?php

namespace Larowka\KudaGo\Laravel;

use Illuminate\Support\Facades\Facade;
use Larowka\KudaGo\Api;
use Larowka\KudaGo\Methods\Movies;
use Larowka\KudaGo\Methods\MovieShowings;
use Larowka\KudaGo\Methods\Places;
use Larowka\KudaGo\Methods\Showings;

/**
 * KudaGo API Laravel Facade
 *
 * @method static Movies movies()
 * @method static Places places()
 * @method static Showings showings()
 * @method static MovieShowings movieShowings(int $movieId)
 */
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
