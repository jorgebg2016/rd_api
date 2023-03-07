<?php

namespace App\Routes;

use OpenApi\Annotations as OA;

/**
 *  @OA\Tag(
 *      name="Customers",
 *      description="Endpoints for management of customers."
 *  ),
 *  @OA\Delete(
 *      path="/api/customers/{customer_id}/destroy",
 *      tags={"Customers"},
 *      operationId="deleteCustomers",
 *      description="Delete customers by its id.",
 *      @OA\Parameter(
 *          name="customer_id",
 *          description="Customer's id",
 *          in="path",
 *          @OA\Schema(type="integet",example="34"),
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Returns the message of customer deleted successfully.",
 *          @OA\JsonContent(ref="#/components/schemas/DestroyCustomersResource")
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad request.",
 *          @OA\JsonContent(ref="#/components/schemas/ApiHttpResource")
 *      ),
 *  ),
 */

class DestroyCustomersRouter
{
}
