<?php

namespace Larowka\KudaGo\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Larowka\KudaGo\Resources\Image;

class ImageTest extends TestCase
{
    private array $image = [
        'image' => 'https://kudago.com/media/images/movie/f3/41/f341493a5375e8cfda47f8a89cec7eb3.jpg',
        'source' => [
            'name' => 'kinonews.ru',
            'link' => 'https://www.kinonews.ru/shot187143/'
        ]
    ];

    private array $imageExtended = [
        'image' => 'https://kudago.com/media/images/movie/f3/41/f341493a5375e8cfda47f8a89cec7eb3.jpg',
        'thumbnails' => [
            '640x384' => 'https://kudago.com/media/thumbs/640x384/images/movie/f3/41/f341493a5375e8cfda47f8a89.jpg',
            '144x96' => 'https://kudago.com/media/thumbs/144x96/images/movie/f3/41/f341493a5375e8cfda47f8a89.jpg'
        ],
        'source' => [
            'name' => 'kinonews.ru',
            'link' => 'https://www.kinonews.ru/shot187143/'
        ]
    ];

    /** @test */
    public function imageFromArray()
    {
        $image = Image::fromArray($this->image);

        $this->assertInstanceOf(Image::class, $image);
    }

    /** @test */
    public function imageExtendedFromArray()
    {
        $imageExtended = Image::fromArray($this->imageExtended);

        $this->assertInstanceOf(Image::class, $imageExtended);
    }
}