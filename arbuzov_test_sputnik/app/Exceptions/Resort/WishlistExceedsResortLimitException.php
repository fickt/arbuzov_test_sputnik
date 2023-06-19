<?php

namespace App\Exceptions\Resort;

use Carbon\Carbon;
use Exception;

class WishlistExceedsResortLimitException extends Exception
{
    public function render()
    {
        return response(
            ['message' => $this->message,
                'timestamp' => Carbon::now()->toDateTimeString()],
            400);
    }
}
