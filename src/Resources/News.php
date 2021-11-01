<?php

namespace Larowka\KudaGo\Resources;

use Illuminate\Support\Collection;

/**
 * @method static News fromArray(array $data) Return an instance of News resource object
 *
 * @property int $id
 * @property int $publication_date
 * @property string $title
 * @property string $slug
 * @property Place|null $place
 * @property string $description
 * @property string $body_text
 * @property Collection|Image[] $images
 * @property string $site_url
 * @property int $favorites_count
 * @property int $comments_count
 * @property bool $disable_comments
 */
class News extends AbstractResource
{
    public static array $attributes = [
        'id'                => true,
        'publication_date'  => true,
        'title'             => true,
        'slug'              => true,
        'place'             => Place::class, // nullable?
        'description'       => true,
        'body_text'         => true,
        'images'            => [Image::class],
        'site_url'          => true,
        'favorites_count'   => true,
        'comments_count'    => true,
        'disable_comments'  => true,
    ];
}