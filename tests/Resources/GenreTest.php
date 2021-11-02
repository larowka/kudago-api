<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Resources\Genre;

class GenreTest extends TestCase
{
    private array $genre = [
        "id"   => 7,
        "name" => "комедия",
        "slug" => "comedy"
    ];

    /** @test */
    public function genreFromArray()
    {
        $genre = Genre::fromArray($this->genre);

        $this->assertInstanceOf(Genre::class, $genre);
    }
}
