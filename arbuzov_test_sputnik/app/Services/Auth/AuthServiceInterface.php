<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\JsonResponse;

interface AuthServiceInterface
{
    public function login(LoginRequest $request): JsonResponse;
    public function logout(): JsonResponse;
    public function register(RegistrationRequest $request): JsonResponse;
}
