<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Collections\MovieCollection;
use Larowka\KudaGo\Resources\Movie;

class Movies extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    /**
     * @return MovieCollection|null
     */
    public function get(): ?MovieCollection
    {
        try {
            return MovieCollection::fromArray($this->response()['results']);
        } catch (GuzzleException $e) {
            return null;
        }
    }

    /**
     * @param int $id
     * @return Movie|null
     */
    public function find(int $id): ?Movie
    {
        parent::find($id);

        try {
            return Movie::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(Movie::$attributes));
        $this->expand = ['images', 'poster'];
    }
}
