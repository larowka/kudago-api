<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\Resources\Showing;
use Larowka\KudaGo\Methods\Traits\{
    HasPaginator,
    HasSort,
    HasDetails,
    HasTimeFilter,
};

/**
 * @method Collection|Showing[]|null get()
 */
class Showings extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    protected string $resource = Showing::class;

    public function inPlace(int $id): self
    {
        $this->params['place_id'] = $id;
        return $this;
    }

    /**
     * @param int $id
     *
     * @return Showing|null
     */
    public function find($id): ?Showing
    {
        parent::find((int)$id);

        try {
            return Showing::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->base = 'movie-showings';
        $this->fields = array_flip(array_keys(Showing::$attributes));
        $this->expand = ['movie', 'place'];
    }
}
