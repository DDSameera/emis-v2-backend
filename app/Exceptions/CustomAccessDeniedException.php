<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use JsonResponseHandler;

class CustomAccessDeniedException extends Exception
{
    public function render()
    {
        $errors = $this->message;
        return JsonResponseHandler:: errorResponse("Access Denied", $errors, Response::HTTP_FORBIDDEN);

    }
}
