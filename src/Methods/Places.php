<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\Resources\Place;
use Larowka\KudaGo\Methods\Traits\{
    HasPaginator,
    HasSort,
    HasDetails,
    HasTimeFilter,
    HasCoordsFilter
};

/**
 * @method Collection|Place[]|null get()
 */
class Places extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;
    use HasCoordsFilter;

    protected string $resource = Place::class;

    public function ids(int ...$ids): self
    {
        $this->params['ids'] = static::arrayToString($ids);
        return $this;
    }

    /**
     * @param int $id
     *
     * @return Place|null
     */
    public function find($id): ?Place
    {
        parent::find((int)$id);

        try {
            return Place::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(Place::$attributes));
        $this->expand = ['images'];
        $this->afterParam = 'showing_since';
        $this->beforeParam = 'showing_until';
    }
}
