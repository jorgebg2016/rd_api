<?php

namespace App\Http\Resources;

class FilterCustomersResource extends BaseResource
{
    public function toArray($request)
    {
        unset($this->updated_at);

        return $this->resource;
    }
}
