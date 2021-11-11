<?php

namespace Larowka\KudaGo\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Larowka\KudaGo\Methods\Traits\{HasDetails, HasPaginator};
use Larowka\KudaGo\Resources\Agent;

class Agents extends AbstractMethod
{
    use HasPaginator;
    use HasDetails;

    protected string $resource = Agent::class;

    /**
     * @param int $id
     *
     * @return Agent|null
     */
    public function find($id): ?Agent
    {
        parent::find((int)$id);

        try {
            return Agent::fromArray($this->response());
        } catch (GuzzleException $e) {
            return null;
        }
    }

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(Agent::$attributes));
        $this->expand = ['participations'];
    }
}