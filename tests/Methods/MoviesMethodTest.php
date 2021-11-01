<?php

namespace Larowka\KudaGo\Tests\Methods;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Larowka\KudaGo\Resources\Movie;
use Larowka\KudaGo\Methods\Movies;

class MoviesMethodTest extends TestCase
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
    public function moviesMethodReturnMovieCollection(): int
    {
        $moviesMethod = new Movies(self::$client);
        $movieCollection = $moviesMethod->get();
        $movieResource = $movieCollection->first();

        $this->assertInstanceOf(Collection::class, $movieCollection);
        $this->assertInstanceOf(Movie::class, $movieResource);

        return $movieResource->id;
    }

    /**
     * @test
     * @depends moviesMethodReturnMovieCollection
     */
    public function moviesMethodReturnMovie(int $id)
    {
        $moviesMethod = new Movies(self::$client);
        $movieResource = $moviesMethod->find($id);

        $this->assertInstanceOf(Movie::class, $movieResource);
        $this->assertTrue($movieResource->id === $id);
    }

    /** @test */
    public function moviesMethodReturnNull()
    {
        $moviesMethod = new Movies(self::$client);
        $movieCollection = $moviesMethod->find(0);
        $this->assertNull($movieCollection);
    }
}
