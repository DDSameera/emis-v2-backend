<?php

namespace App\Exceptions;


use Illuminate\Validation\ValidationException;
use JsonResponseHandler;
use Symfony\Component\HttpFoundation\Response;

class CustomValidationException extends ValidationException
{
    public function render()
    {
        $errors = $this->validator->errors()->all();
        return JsonResponseHandler:: errorResponse("Validation Errors", $errors, Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
