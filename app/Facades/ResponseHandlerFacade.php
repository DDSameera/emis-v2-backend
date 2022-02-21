<?php

namespace App\Facades;

use App\Services\JsonResponseHandlerService;
use Illuminate\Support\Facades\Facade;

class ResponseHandlerFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return JsonResponseHandlerService::class;
    }

}
