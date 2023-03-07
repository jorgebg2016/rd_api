<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class StoreCustomersResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        unset($this->updated_at);

        return [
            'message' => trans('common.success.created', [
                'resource' => trans('common.resources.customer')
            ]),
            'data' => $this->resource,
        ];
    }
}
