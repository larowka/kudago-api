<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Collections\PlaceCollection;
use Larowka\KudaGo\Resources\Place;

class Places extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    /**
     * @return PlaceCollection|null
     */
    public function get(): ?PlaceCollection
    {
        try {
            return PlaceCollection::fromArray($this->response()['results']);
        } catch (GuzzleException $e) {
            return null;
        }
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
