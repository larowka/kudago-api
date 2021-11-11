<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static AgentRole fromArray(array $data) Return an instance of AgentRole resource object
 *
 * @property int    $id
 * @property string $slug
 * @property string $name
 * @property string $name_plural
 */
class AgentRole extends AbstractResource
{
    public static array $attributes = [
        'id'          => true,
        'slug'        => true,
        'name'        => true,
        'name_plural' => true
    ];
}