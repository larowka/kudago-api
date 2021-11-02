<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Larowka\KudaGo\Resources\Selection;
use Larowka\KudaGo\Methods\Traits\{
    HasPaginator,
    HasDetails,
    HasSort
};

/**
 * @method Collection|Selection[]|null get()
 */
class Selections extends AbstractMethod
{
    use HasPaginator;
    use HasDetails;
    use HasSort;

    protected string $resource = Selection::class;

    /**
     * @param int $id
     *
     * @return Selection|null
     */
    public function find($id): ?Selection
    {
        parent::find((int)$id);

        try {
            return Selection::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->base = 'lists';
        $this->expand = ['images'];
    }
}
