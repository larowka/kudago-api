<?php

namespace Larowka\KudaGo\Tests\Collections;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Collections\MovieCollection;

class MovieCollectionTest extends TestCase
{
    /** @test */
    public function movieCollectionFromArray()
    {
        $array = ResponseFactory::json('movies')['results'];
        $movieCollection = MovieCollection::fromArray($array);

        $this->assertInstanceOf(MovieCollection::class, $movieCollection);
    }
}