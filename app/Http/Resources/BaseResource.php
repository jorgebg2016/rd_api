<?php

namespace App\Http\Resources;

use App\Http\Resources\PaginatorResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public static function collection($resource)
    {
        if (request('per_page')) {
            $additional = (new PaginatorResource($resource->links()->paginator))
                ->response()
                ->getData(true);

            return parent::newCollection([
                'data' => parent::collection($resource->items()),
                'pagination' => $additional['data']['pagination']
            ]);
        }

        return parent::collection($resource);
    }
}
