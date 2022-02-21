<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
//        AuthenticationException::class,
//        AuthorizationException::class,
//        HttpException::class,
//        ModelNotFoundException::class,
//        TokenMismatchException::class,
        // ValidationException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register()
    {

        $this->renderable(function (Throwable $e, $request) {

            if ($request->wantsJson() && !config('app.debug')) {


                /*Validation Exception*/

                if ($e instanceof ValidationException) {

                    return throw new CustomValidationException($e->validator);
                }

                /*Not Found Exception*/
                if ($e instanceof NotFoundHttpException) {
                    return throw new CustomNotFoundHttpException($e->getMessage());
                }
                /*Authentication Exception*/
                if ($e instanceof AuthenticationException) {
                    return throw new CustomAuthenticationException($e->getMessage());
                }

                /*Access Denied*/
                if ($e instanceof AccessDeniedHttpException) {
                    return throw new CustomAccessDeniedException($e->getMessage());
                }


                /*General Exception*/
                return throw new GeneralException($e->getMessage());
            }

        }

        );


    }


}
