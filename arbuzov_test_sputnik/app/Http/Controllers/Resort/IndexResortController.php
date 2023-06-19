<?php

namespace App\Http\Controllers\Resort;

use Illuminate\Http\JsonResponse;

class IndexResortController extends BaseResortController
{
    public function __invoke(): JsonResponse
    {
        return $this->service->getResorts();
    }
}
