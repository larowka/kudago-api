<?php

namespace Larowka\KudaGo\Methods;

use Larowka\KudaGo\Methods\Traits\{HasDetails, HasPaginator, HasSort};
use Larowka\KudaGo\Resources\News as NewsResource;

class News extends AbstractMethod
{
    use HasPaginator;
    use HasSort;
    use HasDetails;

    protected string $resource = NewsResource::class;

    public function ids(int ...$ids): self
    {
        $this->params['ids'] = static::arrayToString($ids);
        return $this;
    }

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(NewsResource::$attributes));
        $this->expand = ['images', 'place'];
    }
}