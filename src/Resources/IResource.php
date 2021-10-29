<?php

namespace Larowka\KudaGo\Resources;

interface IResource
{
    public static function fromArray(array $data): self;
}
