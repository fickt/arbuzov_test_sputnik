<?php

namespace App\Http\Controllers\Resort;

use App\Services\Resort\ResortServiceInterface;
use Illuminate\Routing\Controller;

class BaseResortController extends Controller
{
    protected ResortServiceInterface $service;

    public function __construct(ResortServiceInterface $service)
    {
        $this->service = $service;
    }
}
