<?php

namespace Larowka\KudaGo\Tests\Collections;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Collections\GenreCollection;

class GenreCollectionTest extends TestCase
{
    /** @test */
    public function genreCollectionFromArray()
    {
        $array = ResponseFactory::json('movie')['genres'];
        $genreCollection = GenreCollection::fromArray($array);

        $this->assertInstanceOf(GenreCollection::class, $genreCollection);
    }
}