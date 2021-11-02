<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\Resources\Event;
use Larowka\KudaGo\Methods\Traits\{
    HasPaginator,
    HasSort,
    HasDetails,
    HasTimeFilter,
    HasCoordsFilter
};

/**
 * @method Collection|Event[]|null get()
 */
class Events extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;
    use HasCoordsFilter;

    protected string $resource = Event::class;

    /**
     * @param int $id
     *
     * @return Event|null
     */
    public function find($id): ?Event
    {
        parent::find((int)$id);

        try {
            return Event::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(Event::$attributes));
        $this->expand = ['images', 'place', 'location', 'dates'];
    }
}
