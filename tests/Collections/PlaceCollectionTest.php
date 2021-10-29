<?php

namespace Larowka\KudaGo\Tests\Collections;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Collections\PlaceCollection;

class PlaceCollectionTest extends TestCase
{
    /** @test */
    public function placeCollectionFromArray()
    {
        $array = ResponseFactory::json('places')['results'];
        $placeCollection = PlaceCollection::fromArray($array);

        $this->assertInstanceOf(PlaceCollection::class, $placeCollection);
    }
}