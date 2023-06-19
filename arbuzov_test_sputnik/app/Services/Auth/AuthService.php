<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\UnauthorizedException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthService implements AuthServiceInterface
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse with generated bearer jwt-token if authentication has been passed successfully
     * @throws UnauthorizedException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->validated())) {
            throw new UnauthorizedException('Unauthorized');
        }
        return $this->createJwtToken($token);
    }

    /**
     * makes jwt-token expired
     */
    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json([
            'message' => 'User has logged out!',
        ], 201);
    }

    /**
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request): JsonResponse
    {
        $user = $this->userService->createUser(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            )
        );

        return response()->json([
            'message' => 'User has successfully been registered!',
            'user' => $user
        ], 201);
    }

    /**
     * generates bearer jwt-token just as user passes the authentication
     * @param $token
     * @return JsonResponse
     */
    private function createJwtToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user(),
        ]);
    }
}
