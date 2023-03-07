<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginatorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'pagination' => [
                'per_page' => (int) $this->perPage(),
                'page' => (int) $this->currentPage(),
                'rows' => (int) $this->lastPage(),
                'total' => (int) $this->total(),
            ],
        ];
    }
}
