<?php

namespace Larowka\KudaGo\Tests\Collections;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Tests\ResponseFactory;
use Larowka\KudaGo\Collections\ImageCollection;

class ImageCollectionTest extends TestCase
{
    /** @test */
    public function imageCollectionFromArray()
    {
        $array = ResponseFactory::json('movie')['images'];
        $imageCollection = ImageCollection::fromArray($array);

        $this->assertInstanceOf(ImageCollection::class, $imageCollection);
    }
}