<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Resources\{AbstractResource,
    Commentary,
    Coords,
    Event,
    EventCategory,
    Genre,
    Image,
    ImageSource,
    Location,
    Movie,
    News,
    Place,
    PlaceCategory,
    Selection,
    Showing,
    Timestamp,
    User};

class ResourceTest extends TestCase
{
    private array $resources = [
        Commentary::class,
        Event::class,
        EventCategory::class,
        Genre::class,
        Movie::class,
        News::class,
        Place::class,
        PlaceCategory::class,
        Selection::class,
        Showing::class,
    ];

    private array $resourcesWithoutId = [
        Coords::class,
        Image::class,
        ImageSource::class,
        Location::class,
        Timestamp::class,
        User::class,
    ];

    public function testAbstractResource(): void
    {
        $stub = $this->getMockForAbstractClass(AbstractResource::class);
        $abstractResource = $stub::fromArray([]);

        $this->assertInstanceOf(AbstractResource::class, $abstractResource);
    }

    public function testConcreteResources(): void
    {
        $id = 333;
        foreach ($this->resources as $resource) {
            $concrete = $resource::fromArray(['id' => $id]);
            $this->assertInstanceOf($resource, $concrete);
            $this->assertEquals($id, $concrete->id);
        }

        foreach ($this->resourcesWithoutId as $resource) {
            $concrete = $resource::fromArray(['id' => $id]);
            $this->assertInstanceOf($resource, $concrete);
        }
    }
}