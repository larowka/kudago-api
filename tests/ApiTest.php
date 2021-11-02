<?php

namespace Larowka\KudaGo\Tests;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Api;
use Larowka\KudaGo\Methods\{Movies, Places, Showings};
use Larowka\KudaGo\Resources\{Movie, Place, Showing};

class ApiTest extends TestCase
{
    private Api $api;

    protected function setUp(): void
    {
        $this->api = new Api();
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
