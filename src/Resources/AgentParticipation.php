<?php

namespace Larowka\KudaGo\Resources;

use Larowka\KudaGo\ResourceFactory;

/**
 * @method static AgentParticipation fromArray(array $data) Return an instance of AgentParticipation resource object
 *
 * @property AgentRole $role
 * @property mixed     $item
 */
class AgentParticipation extends AbstractResource
{
    public static array $attributes = [
        'role' => AgentRole::class,
        'item' => ResourceFactory::class
    ];
}