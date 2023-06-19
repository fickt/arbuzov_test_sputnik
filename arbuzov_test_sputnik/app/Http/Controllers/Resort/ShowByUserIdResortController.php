<?php

namespace App\Http\Controllers\Resort;

use Illuminate\Http\JsonResponse;

class ShowByUserIdResortController extends BaseResortController
{
    public function __invoke(int $userId): JsonResponse
    {
        return $this->service->getResortsFromWishlistByUserId($userId);
    }
}
