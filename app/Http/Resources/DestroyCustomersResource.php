<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="DestroyCustomersResource",
 *     type="object",
 *     allOf={
 *     @OA\Schema(
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             format="string",
 *             example="Cliente com o id 34 excluido com sucesso.",
 *         ),
 *      ),
 *   }
 * )
 */
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
