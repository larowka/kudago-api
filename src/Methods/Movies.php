<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\Resources\Movie;
use Larowka\KudaGo\Methods\Traits\{
    HasPaginator,
    HasSort,
    HasDetails,
    HasTimeFilter,
};

/**
 * @method Collection|Movie[]|null get()
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
     *
     * @return Movie|null
     */
    public function find($id): ?Movie
    {
        parent::find((int)$id);

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
