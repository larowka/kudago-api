<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Resources\ImageSource;

class ImageSourceTest extends TestCase
{
    private array $imageSource = [
        'name' => 'kinonews.ru',
        'link' => 'https://www.kinonews.ru/shot187143/'
    ];

    /** @test */
    public function imageSourceFromArray()
    {
        $imageSource = ImageSource::fromArray($this->imageSource);

        $this->assertInstanceOf(ImageSource::class, $imageSource);
    }
}
