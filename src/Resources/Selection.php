<?php

namespace Larowka\KudaGo\Resources;

use Illuminate\Support\Collection;
use Larowka\KudaGo\ResourceFactory;

/**
 * @method static Selection fromArray(array $data) Return an instance of Selection(List) resource object
 *
 * @property int                $id
 * @property string             $ctype
 * @property int                $publication_date
 * @property string             $title
 * @property mixed              $items
 * @property int                $favorites_count
 * @property int                $comments_count
 * @property Collection|Image[] $images
 * @property string             $description
 * @property string             $body_text
 * @property string             $site_url
 * @property string             $item_url
 * @property bool               $disable_comments
 */
class Selection extends AbstractResource
{
    public static array $attributes = [
        'id'               => true,
        'ctype'            => true,
        'publication_date' => true,
        'title'            => true,
        'items'            => [ResourceFactory::class],
        'favorites_count'  => true,
        'comments_count'   => true,
        'images'           => [Image::class],
        'description'      => true,
        'body_text'        => true,
        'site_url'         => true,
        'item_url'         => true,
        'disable_comments' => true,
    ];
}
