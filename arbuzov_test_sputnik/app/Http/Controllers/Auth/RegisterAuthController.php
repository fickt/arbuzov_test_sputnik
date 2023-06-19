<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\JsonResponse;

class RegisterAuthController extends BaseAuthController
{
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        return $this->service->register($request);
    }
}
