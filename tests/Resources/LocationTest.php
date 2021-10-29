<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Resources\Location;

class LocationTest extends TestCase
{
    private array $location = [
        'lat' => 55.99124899999999,
        'lon' => 92.89551999999999
    ];

    /** @test */
    public function locationFromArray()
    {
        $location = Location::fromArray($this->location);
        
        $this->assertInstanceOf(Location::class, $location);
    }
}
