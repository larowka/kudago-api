<?php

namespace Larowka\KudaGo\Resources;

use Illuminate\Support\Collection;

/**
 * @method static Event fromArray(array $data) Return an instance of Event resource object
 *
 * @property int $id
 * @property int $publication_date
 * @property Collection|Timestamp[] $dates
 * @property string $title
 * @property string $slug
 * @property Place $place
 * @property string $description
 * @property string $body_text
 * @property Location $location
 * @property string $categories // array of strings
 * @property string $tagline
 * @property int $age_restriction
 * @property string $price
 * @property bool $is_free
 * @property Collection|Image[] $images
 * @property int $favorites_count
 * @property int $comments_count
 * @property string $site_url
 * @property string $short_title
 * @property string $tags // array of strings
 * @property bool $disable_comments
 * @property string $participants // array of Agents
 */
class Event extends AbstractResource
{
    public static array $attributes = [
        'id'                => true,
        'publication_date'  => true,
        'dates'             => [Timestamp::class],
        'title'             => true,
        'slug'              => true,
        'place'             => Place::class,
        'description'       => true,
        'body_text'         => true,
        'location'          => Location::class,
        'categories'        => true,
        'tagline'           => true,
        'age_restriction'   => true,
        'price'             => true,
        'is_free'           => true,
        'images'            => [Image::class],
        'favorites_count'   => true,
        'comments_count'    => true,
        'site_url'          => true,
        'short_title'       => true,
        'tags'              => true,
        'disable_comments'  => true,
        'participants'      => true,
    ];
}