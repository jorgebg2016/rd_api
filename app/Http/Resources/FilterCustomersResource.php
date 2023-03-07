<?php

namespace App\Http\Resources;

/**
 * @OA\Schema(
 *     schema="FilterCustomersResource",
 *     type="object",
 *     allOf={
 *     @OA\Schema(
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
 *      @OA\Schema(
 *          @OA\Property(
 *              property="pagination",
 *              type="object",
 *              format="object",
 *              @OA\Property(
 *                  property="per_page",
 *                  type="integer",
 *                  format="integer",
 *                  example="5",
 *              ),
 *              @OA\Property(
 *                  property="page",
 *                  type="integer",
 *                  format="integer",
 *                  example="1",
 *              ),
 *              @OA\Property(
 *                  property="rows",
 *                  type="integer",
 *                  format="integer",
 *                  example="5",
 *              ),
 *              @OA\Property(
 *                  property="total",
 *                  type="integer",
 *                  format="integer",
 *                  example="20",
 *              ),
 *          )
 *      )
 *   }
 * )
 */
class FilterCustomersResource extends BaseResource
{
    public function toArray($request)
    {
        unset($this->updated_at);

        return $this->resource;
    }
}
