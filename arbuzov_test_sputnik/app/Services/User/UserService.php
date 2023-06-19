<?php

namespace App\Services\User;

use App\Exceptions\User\UserNotFoundException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    /**
     * @param int $userId
     * @return User
     * @throws UserNotFoundException
     */
    public function getUserById(int $userId): User
    {
        $user = User::find($userId);
        if (!$user) {
            throw new UserNotFoundException('User with id:' . $userId . ' has not been found!');
        }
        return $user;
    }

    /**
     * @return User current authenticated user
     * @throws UserNotFoundException
     */
    public function getCurrentUser(): User
    {
        $userId = Auth::id();
        return $this->getUserById($userId);
    }

    /**
     * @param $userInfo - email and password
     * @return User registered user
     */
    public function createUser($userInfo): User
    {
        return User::create($userInfo);
    }
}
