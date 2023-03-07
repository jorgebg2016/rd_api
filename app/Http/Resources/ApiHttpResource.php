<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ApiHttpResource.
 *
 * @OA\Schema(
 *      schema="ApiHttpResource",
 *      type="object",
 *      description="Response for status code return API",
 *      title="Status Code Resource",
 *      oneOf={
 *          @OA\Schema(
 *              schema="HTTP Return",
 *              title="HTTP Return",
 *				required={"message"},
 *              @OA\Property(property="message", format="array", type="array", @OA\Items(), example={0: "Error message"}, description="Returned messages"),
 *          ),
 *      }
 * )
 */
class ApiHttpResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'message' => $this['message']
        ];
    }
}
