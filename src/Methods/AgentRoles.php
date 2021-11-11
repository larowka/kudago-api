<?php

namespace Larowka\KudaGo\Methods;

use Larowka\KudaGo\Methods\Traits\HasPaginator;
use Larowka\KudaGo\Resources\AgentRole;

class AgentRoles extends AbstractMethod
{
    use HasPaginator;

    protected string $resource = AgentRole::class;

    protected function config(): void
    {
        $this->fields = array_flip(array_keys(AgentRole::$attributes));
        $this->base = 'agent-roles';
    }
}
