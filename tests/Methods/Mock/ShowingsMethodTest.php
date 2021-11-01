<?php

namespace Larowka\KudaGo\Tests\Methods\Mock;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Resources\Showing;
use Larowka\KudaGo\Methods\Showings;

class ShowingsMethodTest extends TestCase
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
    public function showingsMethodReturnShowingCollection()
    {
        $showingsMethod = new Showings(self::$client);
        $showingCollection = $showingsMethod->get();

        $this->assertInstanceOf(Collection::class, $showingCollection);
    }

    /** @test */
    public function showingsMethodReturnShowing()
    {
        $showingsMethod = new Showings(self::$client);
        $showingResource = $showingsMethod->get()->first();

        $this->assertInstanceOf(Showing::class, $showingResource);
    }

    /** @test */
    public function showingsMethodReturnEmptyCollection()
    {
        $showingsMethod = new Showings(self::$client);
        $showingCollection = $showingsMethod->get();

        $this->assertTrue($showingCollection->isEmpty());
    }
}
