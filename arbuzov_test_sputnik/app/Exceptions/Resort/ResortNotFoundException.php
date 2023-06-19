<?php

namespace App\Exceptions\Resort;

use Carbon\Carbon;
use Exception;

class ResortNotFoundException extends Exception
{
    public function render()
    {
        return response(
            ['message' => $this->message,
                'timestamp' => Carbon::now()->toDateTimeString()
            ],
            404);
    }//
}
