<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Showing fromArray(array $data) Return an instance of Showing resource object
 *
 * @property int    $id
 * @property Movie  $movie
 * @property Place  $place
 * @property int    $datetime
 * @property bool   $three_d
 * @property bool   $imax
 * @property bool   $four_dx
 * @property bool   $original_language
 * @property string $price
 */
class Showing extends AbstractResource
{
    public static array $attributes = [
        'id'                => true,
        'movie'             => Movie::class,
        'place'             => Place::class,
        'datetime'          => true,
        'three_d'           => true,
        'imax'              => true,
        'four_dx'           => true,
        'original_language' => true,
        'price'             => true,
    ];
}
