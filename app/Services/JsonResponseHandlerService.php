<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;


class JsonResponseHandlerService
{


    public function successResponse($message = null, $data = null, $code = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'status' => true,
            'message' => $message,
            'code' => $code
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return HttpResponse::json($response,$code);

    }

    public function errorResponse($message = null, $data = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        $response = [
            'status' => false,
            'message' => $message,
            'code' => $code
        ];

        if ($data) {
            $response['data'] =  is_array($data) ? $data : [$data];

        }


        return HttpResponse::json($response,$code);
    }

}
