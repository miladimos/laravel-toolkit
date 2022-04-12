<?php

namespace Miladimos\Toolkit\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ApiResponder
{
    protected function responseSuccess($data, $statusCode = 200, $statusMessage = "Ok", array $headers = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status_code' => $statusCode,
            'status_message' => $statusMessage,
            'data' => $data,
        ], $statusCode, $headers);
    }

    protected function responseError($data, $statusCode = 500, $statusMessage = "Error", array $headers = []): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status_code' => $statusCode,
            'status_message' => $statusMessage,
            'data' => $data,
        ], $statusCode, $headers);
    }

    /**
     * @param array|Collection $data
     * @param integer $status
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function response($data = [], int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        return response()->json($data, $status, $headers, $options);
    }

    /**
     * @param LengthAwarePaginator $paginator
     * @param int $status
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function paginate(LengthAwarePaginator $paginator, int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        $data = [
            'data' => $paginator->getCollection(),
            'pagination' => [
                'total' => $paginator->total(),
                'per_page' => $paginator->perPage(),
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'previous_url' => $paginator->previousPageUrl(),
                'next_url' => $paginator->nextPageUrl()
            ]
        ];

        return response()->json($data, $status, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseOk($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_OK, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseCreated($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_CREATED, $headers, $options);
    }

    /**
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseNoContent(array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response([], JsonResponse::HTTP_NO_CONTENT, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseBadRequest($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_BAD_REQUEST, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseMovedPermanently($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_MOVED_PERMANENTLY, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseFound($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_FOUND, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseUnauthorized($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_UNAUTHORIZED, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseForbidden($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_FORBIDDEN, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseNotFound($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_NOT_FOUND, $headers, $options);
    }

    /**
     * @param array $data
     * @param array $headers
     * @param integer $options
     * @return JsonResponse
     */
    public function responseInternalServerError($data = [], array $headers = [], int $options = 0): JsonResponse
    {
        return $this->response($data, JsonResponse::HTTP_INTERNAL_SERVER_ERROR, $headers, $options);
    }
}
