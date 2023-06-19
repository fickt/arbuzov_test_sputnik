<?php

namespace App\Http\Controllers\Resort;

use Illuminate\Http\JsonResponse;

class UpdateResortController extends BaseResortController
{
    public function __invoke(int $resortId): JsonResponse
    {
        return $this->service->addResortToWishlistByResortId($resortId);
    }
}
