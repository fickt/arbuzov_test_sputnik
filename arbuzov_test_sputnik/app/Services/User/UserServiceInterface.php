<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    public function getUserById(int $userId): User;

    public function getCurrentUser(): User;

    public function createUser($userInfo): User;
}
