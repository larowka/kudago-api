<?php

namespace Larowka\KudaGo\Resources;

/**
 * @method static Commentary fromArray(array $data) Return an instance of Commentary resource object
 *
 * @property int $id
 * @property string $date_posted
 * @property string $text
 * @property User $user
 * @property bool $is_deleted
 * @property int $replies_count
 * @property string|null $thread
 * @property string|null $reply_to
 */
class Commentary extends AbstractResource
{
    public static array $attributes = [
        'id'            => true,
        'date_posted'   => true,
        'text'          => true,
        'user'          => User::class,
        'is_deleted'    => true,
        'replies_count' => true,
        'thread'        => true,
        'reply_to'      => true
    ];
}