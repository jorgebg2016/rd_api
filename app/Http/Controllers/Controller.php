<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, DispatchesJobs;

    /**
     * Http Bad Request Response Error.
     *
     * @param Throwable $exception
     * @return JsonResponse
     */
    protected function badRequestResponse(Throwable $exception): JsonResponse {

        return response()
            ->json([
                'message' => $exception->getMessage()
            ])
            ->setStatusCode(Response::HTTP_BAD_REQUEST);
    }

    /**
     * Http Not Found Response Error.
     *
     * @param string $resource
     * @param int $resource_id
     * @return JsonResponse
     */
    protected function notFoundByIDResponse(string $resource, int $resource_id): JsonResponse {

        return response()
            ->json([
                'message' => trans('common.errors.not_found_by_id', [
                    'resource' => trans('common.resources.' . $resource),
                    'resource_id' => $resource_id
                ])
            ])
            ->setStatusCode(Response::HTTP_NOT_FOUND);
    }
}
