<?php

namespace Larowka\KudaGo\Tests\Methods\Mock;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Resources\Movie;
use Larowka\KudaGo\Methods\Movies;

class MoviesMethodTest extends TestCase
{
    private static Client $client;

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

    /** @test */
    public function moviesMethodReturnMovieCollection()
    {
        $moviesMethod = new Movies(self::$client);
        $movieCollection = $moviesMethod->get();

        $this->assertInstanceOf(Collection::class, $movieCollection);
    }

    /** @test */
    public function moviesMethodReturnMovie()
    {
        $moviesMethod = new Movies(self::$client);
        $movieResource = $moviesMethod->get()->first();

        $this->assertInstanceOf(Movie::class, $movieResource);
    }

    /** @test */
    public function moviesMethodReturnEmptyCollection()
    {
        $moviesMethod = new Movies(self::$client);
        $movieCollection = $moviesMethod->get();

        $this->assertTrue($movieCollection->isEmpty());
    }
}
