<?php

namespace Larowka\KudaGo\Methods;

trait HasPaginator
{
    public function page(int $number = 1)
    {
        $this->params['page'] = $number;
        return $this;
    }

    public function pageSize(int $size = 20)
    {
        $this->params['page_size'] = $size;
        return $this;
    }
}
