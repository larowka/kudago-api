<?php

namespace Larowka\KudaGo\Tests\Methods;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Larowka\KudaGo\Resources\Place;
use Larowka\KudaGo\Methods\Places;

class PlacesMethodTest extends TestCase
{
    private const BASE_URI    = 'https://kudago.com/public-api';
    private const API_VERSION = 'v1.4';

    private static Client $client;

    public static function setUpBeforeClass(): void
    {
        $config = [
            'headers'  => ['Accept' => 'application/json'],
            'base_uri' => self::BASE_URI . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR,
        ];

        self::$client = new Client($config);
    }

    /** @test */
    public function placesMethodReturnPlaceCollection(): int
    {
        $placesMethod = new Places(self::$client);
        $placeCollection = $placesMethod->get();
        $placeResource = $placeCollection->first();

        $this->assertInstanceOf(Collection::class, $placeCollection);
        $this->assertInstanceOf(Place::class, $placeResource);

        return $placeResource->id;
    }

    /**
     * @test
     * @depends placesMethodReturnPlaceCollection
     */
    public function placesMethodReturnPlace(int $id)
    {
        $placesMethod = new Places(self::$client);
        $placeResource = $placesMethod->find($id);

        $this->assertInstanceOf(Place::class, $placeResource);
        $this->assertTrue($placeResource->id === $id);
    }

    /** @test */
    public function placesMethodReturnNull()
    {
        $placesMethod = new Places(self::$client);
        $placeCollection = $placesMethod->find(0);
        $this->assertNull($placeCollection);
    }
}
