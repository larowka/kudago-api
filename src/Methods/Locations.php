<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\Methods\Traits\HasSort;
use Larowka\KudaGo\Resources\Location;

/**
 * @method Collection|Location[]|null get()
 */
class Locations extends AbstractMethod
{
    use HasSort;

    protected string $resource = Location::class;

    /**
     * @param string $slug
     *
     * @return Location|null
     */
    public function find($slug): ?Location
    {
        parent::find((string)$slug);

        try {
            return Location::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->orderBy = $this->fields = array_flip(array_keys(Location::$attributes));
    }
}
