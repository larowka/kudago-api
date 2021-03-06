<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Resources\Coords;

class LocationTest extends TestCase
{
    private array $coords = [
        'lat' => 55.99124899999999,
        'lon' => 92.89551999999999
    ];

    /** @test */
    public function locationFromArray()
    {
        $coords = Coords::fromArray($this->coords);

        $this->assertInstanceOf(Coords::class, $coords);
    }
}
