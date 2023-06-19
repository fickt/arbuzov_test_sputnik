<?php

namespace App\Services\Resort;

use Illuminate\Http\JsonResponse;

interface ResortServiceInterface
{
    public function getResorts(): JsonResponse;
    public function getResortsFromWishlist(): JsonResponse;
    public function getResortsFromWishlistByUserId(int $userId): JsonResponse;
    public function addResortToWishlistByResortId(int $resortId): JsonResponse;
}
