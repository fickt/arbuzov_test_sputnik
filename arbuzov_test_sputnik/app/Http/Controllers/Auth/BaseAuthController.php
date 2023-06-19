<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthServiceInterface;
use Illuminate\Routing\Controller;

class BaseAuthController extends Controller
{
    protected AuthServiceInterface $service;

    public function __construct(AuthServiceInterface $service)
    {
        $this->service = $service;
    }
}
