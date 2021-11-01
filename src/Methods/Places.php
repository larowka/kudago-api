<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Resources\Place;

/**
 * @method \Illuminate\Support\Collection|Place[]|null get()
 */
class Places extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    protected string $resource = Place::class;

    public function ids(array $ids): self
    {
        $this->params['ids'] = static::arrayToString($ids);
        return $this;
    }

    public function inRadius(float $latitude, float $longitude, int $radius): self
    {
        $location = [
            'lat' => $latitude,
            'lon' => $longitude,
            'radius' => $radius
        ];
        $this->params += $location;
        return $this;
    }

    /**
     * @param int $id
     * @return Place|null
     */
    public function find(int $id): ?Place
    {
        parent::find($id);

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
