<?php

namespace App\Exceptions\Auth;

use Carbon\Carbon;
use Exception;

class UnauthorizedException extends Exception
{
    public function render()
    {
        return response(
            ['message' => $this->message,
                'timestamp' => Carbon::now()->toDateTimeString()
            ],
            401);
    }
}
