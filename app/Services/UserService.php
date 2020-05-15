<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function createUser($email, $password, $name)
    {
        return User::create(
            [
                'email' => $email,
                'password' => Hash::make($password),
                'name' => $name
            ]
        );
    }

    public static function getUserMinifinedById($userId = 0)
    {
        if ($userId === 0) {
            $userId = Auth::id();
            if ($userId === null) return null;
        }
        return UserService::formingUserMinifined(User::find($userId));
    }

    public static function userMinifined(User $user)
    {
        return UserService::formingUserMinifined($user);
    }

    public static function formingUserMinifined(User $user)
    {
        if ($user) return ['id' => $user->id, 'name' => $user->name];
        return null;
    }
}
