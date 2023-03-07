<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class DestroyCustomersResource extends BaseResource
{
    private int $customer_id;

    public function __construct(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => trans('common.success.deleted', [
                'resource' => trans('common.resources.customer'),
                'resource_id' => $this->customer_id,
            ]),
        ];
    }
}
