<?php

namespace Larowka\KudaGo\Resources;

/**
 * @property int $start
 * @property int $end
 */
class Timestamp extends AbstractResource
{
    public static array $attributes = [
        'start' => true,
        'end'   => true
    ];
}
