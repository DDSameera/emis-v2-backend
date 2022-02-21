<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use JsonResponseHandler;
class CustomAuthenticationException extends Exception
{
    public function render()
    {
        $errors = $this->message;
        return JsonResponseHandler:: errorResponse("Authorization Error", $errors, Response::HTTP_UNAUTHORIZED);

    }
}
