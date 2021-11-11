<?php

namespace Larowka\KudaGo\Methods;

use Larowka\KudaGo\Methods\Traits\{HasDetails, HasPaginator};
use Larowka\KudaGo\Resources\EventOfTheDay;

class EventsOfTheDay extends AbstractMethod
{
    use HasDetails;
    use HasPaginator;

    protected string $resource = EventOfTheDay::class;

    protected function config(): void
    {
        $this->base = 'events-of-the-day';
        $this->expand = ['object'];
    }
}