<?php

namespace App\Routes;

use OpenApi\Annotations as OA;

/**
 *  @OA\Tag(
 *      name="Customers",
 *      description="Endpoints for management of customers."
 *  ),
 *  @OA\Get(
 *      path="/api/customers/filter",
 *      tags={"Customers"},
 *      operationId="filterCustomers",
 *      description="List, Filter and paginate customers.",
 *      @OA\Parameter(
 *          name="full_name",
 *          description="Customers' full name",
 *          in="query",
 *          @OA\Schema(type="string",example="Jorge Fernando"),
 *      ),
 *      @OA\Parameter(
 *          name="cpf",
 *          description="Customers' cpf",
 *          in="query",
 *          @OA\Schema(type="string",example="345.543.544-45"),
 *      ),
 *      @OA\Parameter(
 *          name="page",
 *          description="Number of the page",
 *          in="query",
 *          @OA\Schema(type="integer",example="1"),
 *      ),
 *      @OA\Parameter(
 *          name="per_page",
 *          description="Number of items per page",
 *          in="query",
 *          @OA\Schema(type="integer",example="5"),
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Returns the list of filtered and paginated customers.",
 *          @OA\JsonContent(ref="#/components/schemas/FilterCustomersResource")
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad request.",
 *          @OA\JsonContent(ref="#/components/schemas/ApiHttpResource")
 *      ),
 *  ),
 */

class FilterCustomersRouter
{
}
