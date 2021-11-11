<?php

namespace Larowka\KudaGo\Resources;

use Illuminate\Support\Collection;

/**
 * @method static Agent fromArray(array $data) Return an instance of Agent resource object
 *
 * @property int                             $id
 * @property string                          $title
 * @property string                          $slug
 * @property string                          $description
 * @property string                          $body_text
 * @property float                           $rank
 * @property string                          $agent_type
 * @property Collection|Image[]              $images
 * @property int                             $favorites_count
 * @property int                             $comments_count
 * @property string                          $site_url
 * @property bool                            $disable_comments
 * @property Collection|AgentParticipation[] $participations
 * @property bool                            $is_stub
 */
class Agent extends AbstractResource
{
    public static array $attributes = [
        'id'               => true,
        'title'            => true,
        'slug'             => true,
        'description'      => true,
        'body_text'        => true,
        'rank'             => true,
        'agent_type'       => true,
        'images'           => [Image::class],
        'favorites_count'  => true,
        'comments_count'   => true,
        'site_url'         => true,
        'disable_comments' => true,
        'participations'   => [AgentParticipation::class],
        'is_stub'          => true,
    ];
}