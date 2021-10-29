<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Resources\Showing;

class ShowingTest extends TestCase
{
    /** @test */
    public function showingFromArray()
    {
        $array = ResponseFactory::json('movie-showing');
        $place = Showing::fromArray($array);

        $this->assertInstanceOf(Showing::class, $place);
    }
}
