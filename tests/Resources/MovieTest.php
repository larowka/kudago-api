<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Resources\Movie;

class MovieTest extends TestCase
{
    /** @test */
    public function movieFromArray()
    {
        $array = ResponseFactory::json('place');
        $place = Movie::fromArray($array);

        $this->assertInstanceOf(Movie::class, $place);
    }
}
