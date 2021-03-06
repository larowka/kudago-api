<?php

namespace Larowka\KudaGo\Tests\Methods\Mock;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Resources\Place;
use Larowka\KudaGo\Methods\Places;

class PlacesMethodTest extends TestCase
{
    private static Client $client;

    public static function setUpBeforeClass(): void
    {
        $mock = new MockHandler([
            ResponseFactory::get('places'),
            ResponseFactory::get('places'),
            ResponseFactory::get('error', 404)
        ]);

        self::$client = new Client([
            'handler' => HandlerStack::create($mock)
        ]);
    }

    /** @test */
    public function placesMethodReturnPlaceCollection()
    {
        $placesMethod = new Places(self::$client);
        $placeCollection = $placesMethod->get();

        $this->assertInstanceOf(Collection::class, $placeCollection);
    }

    /** @test */
    public function placesMethodReturnPlace()
    {
        $placesMethod = new Places(self::$client);
        $placeResource = $placesMethod->get()->first();

        $this->assertInstanceOf(Place::class, $placeResource);
    }

    /** @test */
    public function placesMethodReturnEmptyCollection()
    {
        $placesMethod = new Places(self::$client);
        $placeCollection = $placesMethod->get();

        $this->assertTrue($placeCollection->isEmpty());
    }
}
