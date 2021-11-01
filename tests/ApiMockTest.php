<?php

namespace Larowka\KudaGo\Tests;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Larowka\KudaGo\Api;
use Larowka\KudaGo\Methods\{Movies, Places, Showings};
use Larowka\KudaGo\Resources\{Movie, Place, Showing};

class ApiMockTest extends TestCase
{
    private static Client $client;
    private Api $api;

    public static function setUpBeforeClass(): void
    {
        $mock = new MockHandler([
            ResponseFactory::get('movies'),
            ResponseFactory::get('movies'),
            ResponseFactory::get('error', 404)
        ]);

        self::$client = new Client([
            'handler' => HandlerStack::create($mock)
        ]);
    }

    protected function setUp(): void
    {
        $this->api = $this->createMock(Api::class);
        $this->api->method('movies')
            ->willReturn(new Movies(self::$client));
        $this->api->method('places')
            ->willReturn(new Places(self::$client));
        $this->api->method('showings')
            ->willReturn(new Showings(self::$client));
    }

    /** @test */
    public function createApiInstance()
    {
        $api = new Api();

        $this->assertInstanceOf(Api::class, $api);
    }

    /** @test */
    public function apiMoviesReturnMoviesMethod()
    {
        $movies = $this->api->movies();

        $this->assertInstanceOf(Movies::class, $movies);
    }

    /** @test */
    public function apiMethodMoviesReturnMovieCollection()
    {
        $movies = $this->api->movies()->get();

        $this->assertInstanceOf(Collection::class, $movies);
    }

    /** @test */
    public function apiMethodMoviesReturnMovieResource()
    {
        $movies = $this->api->movies()->get()->first();

        $this->assertInstanceOf(Movie::class, $movies);
    }
}
