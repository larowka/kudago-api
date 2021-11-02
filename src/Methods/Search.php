<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\ResourceFactory;
use Larowka\KudaGo\Methods\Traits\{
    HasPaginator,
    HasDetails,
    HasCoordsFilter
};

class Search extends AbstractMethod
{
    use HasPaginator;
    use HasDetails;
    use HasCoordsFilter;

    public function query(string $query): self
    {
        $this->params['q'] = trim($query);
        return $this;
    }

    public function type(string $type): self
    {
        $type = trim($type);
        if (in_array($type, array_keys(ResourceFactory::$resources))) {
            $this->fields['ctype'] = $type;
            $this->resource = ResourceFactory::$resources[$type];
        }
        return $this;
    }

    public function get(): Collection
    {
        if (isset($this->resource)) {
            return parent::get();
        }

        try {
            $data = $this->response()['results'];
        } catch (GuzzleException $e) {
            return new Collection();
        }

        $collection = new Collection();

        foreach ($data as $item) {
            if ($resource = ResourceFactory::fromArray($item)) {
                $collection->add($resource);
            }
        }

        return $collection;
    }

    /**
     * Not allowed for this method
     */
    public function find($id)
    {
    }

    protected function config(): void
    {
        $this->expand = ['place', 'dates'];
    }
}
