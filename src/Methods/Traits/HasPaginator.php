<?php

namespace Larowka\KudaGo\Methods\Traits;

trait HasPaginator
{
    public function page(int $number = 1): self
    {
        $this->params['page'] = $number;
        return $this;
    }

    public function pageSize(int $size = 20): self
    {
        $this->params['page_size'] = $size;
        return $this;
    }
}
