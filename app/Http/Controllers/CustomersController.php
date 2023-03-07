<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CustomerRepository;
use App\Http\Requests\FilterPaginateCustomersRequest;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Resources\DestroyCustomersResource;
use App\Http\Resources\FilterCustomersResource;
use App\Http\Resources\StoreCustomersResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class CustomersController extends Controller
{
    protected CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function filter(FilterPaginateCustomersRequest $request): JsonResponse|JsonResource
    {
        try {
            $queryStrings = $request->all();

            $customers = $this->repository->filterCustomers($queryStrings);

            return FilterCustomersResource::collection($customers)->response()->setStatusCode(200);

        } catch (Throwable $exception) {

            return $this->badRequestResponse($exception);
        };
    }

    public function store(StoreCustomersRequest $request): JsonResponse|JsonResource
    {
        try {
            $payload = $request->validated();

            $customer = $this->repository->createCustomer($payload);

            return (new StoreCustomersResource($customer))->response()->setStatusCode(200);

        } catch (Throwable $exception) {

            return $this->badRequestResponse($exception);
        };
    }

    public function destroy(int $customer_id): JsonResponse|JsonResource
    {
        try {

            $customer = $this->repository->getCustomer($customer_id);

            if (!$customer) return $this->notFoundByIDResponse('customer', $customer_id);

            $this->repository->deleteCustomer($customer);

            return (new DestroyCustomersResource($customer_id))->response()->setStatusCode(200);

        } catch (Throwable $exception) {

            return $this->badRequestResponse($exception);
        };
    }

}
