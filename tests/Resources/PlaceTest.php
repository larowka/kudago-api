<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Resources\Place;

class PlaceTest extends TestCase
{
    /** @test */
    public function placeFromArray()
    {
        $array = ResponseFactory::json('place');
        $place = Place::fromArray($array);

        $this->assertInstanceOf(Place::class, $place);
    }
}
