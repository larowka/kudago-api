<?php

namespace Larowka\KudaGo\Methods\Traits;

trait HasCoordsFilter
{
    public function inRadius(float $latitude, float $longitude, int $radius): self
    {
        $location = [
            'lat' => $latitude,
            'lon' => $longitude,
            'radius' => $radius
        ];
        $this->params += $location;
        return $this;
    }
}