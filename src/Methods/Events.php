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
 * @method $this orderBy(string ...$fields) Sort result by specific fields: id, publication_date, title, slug, place, description, body_text, location, tagline, age_restriction, price, is_free, favorites_count, comments_count, short_title
 * @method $this expand(string ...$fields) Expand specific fields: images, place, location, dates, participants
 * @method $this before(string $datetime, string $format = 'Y-m-d', bool $exceptions = false)
 * @method $this after(string $datetime, string $format = 'Y-m-d', bool $exceptions = false)
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
