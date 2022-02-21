<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use JsonResponseHandler;
class GeneralException extends Exception
{
    public function render()
    {
        $errors = $this->message;
        return JsonResponseHandler:: errorResponse("General Error", $errors, Response::HTTP_INTERNAL_SERVER_ERROR);

    }
}
