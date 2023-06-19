<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\JsonResponse;

class LogoutAuthController extends BaseAuthController
{
    public function __invoke(): JsonResponse
    {
        return $this->service->logout();
    }
}
