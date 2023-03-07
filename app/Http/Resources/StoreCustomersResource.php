<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;


/**
 * @OA\Schema(
 *     schema="StoreCustomersResource",
 *     type="object",
 *     allOf={
 *     @OA\Schema(
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             format="string",
 *             example="Cliente cadastrado com sucesso.",
 *         ),
 *         @OA\Property(
 *              property="data",
 *              type="array",
 *              format="array",
 *              @OA\Items(
 *                  @OA\Property(
 *                      property="id",
 *                      type="integer",
 *                      format="integer",
 *                      example="1",
 *                  ),
 *                  @OA\Property(
 *                      property="full_name",
 *                      type="string",
 *                      format="string",
 *                      example="Jorge Fernando Camargos",
 *                  ),
 *                  @OA\Property(
 *                      property="cpf",
 *                      type="string",
 *                      format="string",
 *                      example="769.346.343-67",
 *                  ),
 *                  @OA\Property(
 *                      property="phone",
 *                      type="string",
 *                      format="string",
 *                      example="(38) 98861-3263"
 *                  ),
 *                  @OA\Property(
 *                      property="created_at",
 *                      type="date",
 *                      example="2023-03-07T17:48:20.000000Z"
 *                  ),
 *              )
 *         ),
 *      ),
 *   }
 * )
 */
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
