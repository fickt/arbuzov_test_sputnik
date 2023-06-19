<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginAuthController extends BaseAuthController
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        return $this->service->login($request);
    }
}
