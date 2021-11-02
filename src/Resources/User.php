<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static User fromArray(array $data) Return an instance of User resource object
 *
 * @property string $display_name
 * @property string $avatar
 */
class User extends AbstractResource
{
    public static array $attributes = [
        'display_name' => true,
        'avatar'       => true
    ];
}
