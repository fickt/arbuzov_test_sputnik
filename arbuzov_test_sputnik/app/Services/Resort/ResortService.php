<?php

namespace App\Services\Resort;

use App\Exceptions\Resort\ResortNotFoundException;
use App\Exceptions\Resort\WishlistExceedsResortLimitException;
use App\Models\Resort;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;

class ResortService implements ResortServiceInterface
{
    private const WISHLIST_MAX_LENGTH = 3;
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return JsonResponse returns all resorts
     */
    public function getResorts(): JsonResponse
    {
        return response()->json(Resort::all());
    }

    /**
     * @return JsonResponse returns all resorts from wishlist of current user
     */
    public function getResortsFromWishlist(): JsonResponse
    {
        $user = $this->userService->getCurrentUser();
        return response()->json($user->resorts()->get());
    }

    /**
     * @param int $userId
     * @return JsonResponse returns all resorts from wishlist of user with $userId
     */
    public function getResortsFromWishlistByUserId(int $userId): JsonResponse
    {
        $user = $this->userService->getUserById($userId);
        return response()->json($user->resorts()->get());
    }

    /**
     * adds resort with $resortId to wishlist of current user
     * @param int $resortId
     * @return JsonResponse
     * @throws ResortNotFoundException|WishlistExceedsResortLimitException
     */
    public function addResortToWishlistByResortId(int $resortId): JsonResponse
    {
        $user = $this->userService->getCurrentUser();
        $resort = Resort::find($resortId);
        if (!$resort) {
            throw new ResortNotFoundException('Resort with id:' . $resortId . ' has not been found!');
        }

        if (count($user->resorts()->get()) == self::WISHLIST_MAX_LENGTH) {
            throw new WishlistExceedsResortLimitException('You can not add more than ' . self::WISHLIST_MAX_LENGTH . ' resorts to your wishlist!');
        }

        $user->resorts()->attach($resort);
        return response()->json($user->resorts()->get(), 201);
    }
}
