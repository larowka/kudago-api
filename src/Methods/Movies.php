<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Resources\Movie;

/**
 * @method \Illuminate\Support\Collection|Movie[]|null get()
 */
class Movies extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    protected string $resource = Movie::class;

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
