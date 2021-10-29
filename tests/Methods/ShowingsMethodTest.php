<?php

namespace Larowka\KudaGo\Tests\Methods;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Larowka\KudaGo\Collections\ShowingCollection;
use Larowka\KudaGo\Resources\Showing;
use Larowka\KudaGo\Methods\Showings;

class ShowingsMethodTest extends TestCase
{
    private const BASE_URI = 'https://kudago.com/public-api';
    private const API_VERSION = 'v1.4';

    private static Client $client;

    public static function setUpBeforeClass(): void
    {
        $config = [
            'headers' => ['Accept' => 'application/json'],
            'base_uri' => self::BASE_URI . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR,
        ];

        self::$client = new Client($config);
    }

    /** @test */
    public function showingsMethodReturnShowingCollection(): int
    {
        $showingsMethod = new Showings(self::$client);
        $showingCollection = $showingsMethod->get();
        $showingResource = $showingCollection->first();

        $this->assertInstanceOf(ShowingCollection::class, $showingCollection);
        $this->assertInstanceOf(Showing::class, $showingResource);

        return $showingResource->id;
    }

    /**
     * @test
     * @depends showingsMethodReturnShowingCollection
     */
    public function showingsMethodReturnShowing(int $id)
    {
        $showingsMethod = new Showings(self::$client);
        $showingResource = $showingsMethod->find($id);

        $this->assertInstanceOf(Showing::class, $showingResource);
        $this->assertTrue($showingResource->id === $id);
    }

    /** @test */
    public function showingsMethodReturnNull()
    {
        $showingsMethod = new Showings(self::$client);
        $showingCollection = $showingsMethod->find(0);
        $this->assertNull($showingCollection);
    }
}
