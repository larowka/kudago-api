<?php

namespace Larowka\KudaGo\Resources;

use Illuminate\Support\Collection;

/**
 * @method static Place fromArray(array $data) Return an instance of Place resource object
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $address
 * @property string $timetable
 * @property string $phone
 * @property string $is_stub
 * @property string $body_text
 * @property string $description
 * @property string $site_url
 * @property string $foreign_url
 * @property Coords $coords
 * @property string $lat
 * @property string $lon
 * @property string $subway
 * @property int $favorites_count
 * @property Collection|Image[] $images
 * @property int $comments_count
 * @property bool $is_closed
 * @property array $categories
 * @property string $short_title
 * @property array $tags
 * @property string $location
 * @property int $age_restriction
 * @property bool $disable_comments
 * @property bool $has_parking_lot
 */
class Place extends AbstractResource
{
    public static array $attributes = [
        'id'                  => true,
        'title'               => true,
        'slug'                => true,
        'address'             => true,
        'timetable'           => true,
        'phone'               => true,
        'is_stub'             => true,
        'body_text'           => true,
        'description'         => true,
        'site_url'            => true,
        'foreign_url'         => true,
        'coords'              => Coords::class,
        'subway'              => true, // todo: convert to array of strings?
        'favorites_count'     => true,
        'images'              => [Image::class],
        'comments_count'      => true,
        'is_closed'           => true,
        'categories'          => true, // todo: simple array of strings
        'short_title'         => true,
        'tags'                => true, // todo: simple array of strings
        'location'            => true,
        'age_restriction'     => true,
        'disable_comments'    => true,
        'has_parking_lot'     => true,
    ];
}
