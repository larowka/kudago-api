<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Collections\ShowingCollection;
use Larowka\KudaGo\Resources\Showing;

class Showings extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    public function inPlace(int $id): self
    {
        $this->params['place_id'] = $id;
        return $this;
    }

    /**
     * @return ShowingCollection|null
     */
    public function get(): ?ShowingCollection
    {
        try {
            return ShowingCollection::fromArray($this->response()['results']);
        } catch (GuzzleException $e) {
            return null;
        }
    }

    /**
     * @param int $id
     * @return Showing|null
     */
    public function find(int $id): ?Showing
    {
        parent::find($id);

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
