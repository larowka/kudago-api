<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Resources\Showing;

/**
 * @method \Illuminate\Support\Collection|Showing[]|null get()
 */
class MovieShowings extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;
    use HasTimeFilter;

    protected string $resource = Showing::class;

    public function __construct(Client $client, int $movieId)
    {
        parent::__construct($client);
        $this->base .= DIRECTORY_SEPARATOR . $movieId . DIRECTORY_SEPARATOR . 'showings';
    }

    public function inPlace(int $id): self
    {
        $this->params['place_id'] = $id;
        return $this;
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
        $this->base = 'movies';
        $this->fields = array_flip(array_keys(Showing::$attributes));
        $this->expand = ['movie', 'place'];
    }
}
