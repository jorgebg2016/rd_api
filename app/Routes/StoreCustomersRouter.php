<?php

namespace App\Routes;

use OpenApi\Annotations as OA;

/**
 *  @OA\Tag(
 *      name="Customers",
 *      description="Endpoints for management of customers."
 *  ),
 *  @OA\Post(
 *      path="/api/customers/store",
 *      tags={"Customers"},
 *      operationId="storeCustomers",
 *      description="Store a new customer.",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application\json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="full_name",
 *                      type="string",
 *                      format="string",
 *                      example="Jorge Fernando Campos Camargos"
 *                  ),
 *                  @OA\Property(
 *                      property="cpf",
 *                      type="string",
 *                      format="string",
 *                      example="654.654.334-65"
 *                  ),
 *                  @OA\Property(
 *                      property="birthday",
 *                      type="date",
 *                      format="y-m-d",
 *                      example="2000-12-21"
 *                  ),
 *                  @OA\Property(
 *                      property="phone",
 *                      type="string",
 *                      format="string",
 *                      example="(38) 98861-3232"
 *                  ),
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Returns the new stored customer.",
 *          @OA\JsonContent(ref="#/components/schemas/StoreCustomersResource")
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad request.",
 *          @OA\JsonContent(ref="#/components/schemas/ApiHttpResource")
 *      ),
 *  ),
 */

class StoreCustomersRouter
{
}
