<?php

namespace App\Exceptions;

use JsonResponseHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomNotFoundHttpException extends NotFoundHttpException
{

    public function render()
    {
        $message = $this->formatMessage($this->getMessage());

        return JsonResponseHandler:: errorResponse($message, [], Response::HTTP_UNPROCESSABLE_ENTITY);

    }

    public function formatMessage($message)
    {
        $message = str_replace("[App\\Models\\", "", $message);
        $message = str_replace("]", "", $message);
        $message = str_replace("model", "", $message);
        return preg_replace('/[0-9]/', "", $message);
    }
}
