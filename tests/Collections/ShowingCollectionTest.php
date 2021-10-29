<?php

namespace Larowka\KudaGo\Tests\Collections;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Collections\ShowingCollection;

class ShowingCollectionTest extends TestCase
{
    /** @test */
    public function showingCollectionFromArray()
    {
        $array = ResponseFactory::json('movie-showings')['results'];
        $showingCollection = ShowingCollection::fromArray($array);

        $this->assertInstanceOf(ShowingCollection::class, $showingCollection);
    }
}