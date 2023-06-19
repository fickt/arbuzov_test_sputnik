<?php

namespace App\Exceptions\User;

use Carbon\Carbon;
use Exception;

class UserNotFoundException extends Exception
{
    public function render()
    {
        return response(
            ['message' => $this->message,
             'timestamp' => Carbon::now()->toDateTimeString()],
            404);
    }
}
