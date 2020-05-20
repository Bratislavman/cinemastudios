<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    const ROLE_ID_ADMIN = 1;
    const ROLE_ID_USER = 2;

    const USER_ROLES = [
        [
            'name' => 'Администратор',
            'machine_name' => 'admin',
            'id' => self::ROLE_ID_ADMIN
        ],
        [
            'name' => 'Пользователь',
            'machine_name' => 'user',
            'id' => self::ROLE_ID_USER
        ],
    ];

    public static function getRoleProperty($machine_name, $propertyName = 'user_id')
    {
        foreach (UserService::USER_ROLES as $entity) if ($machine_name == $entity['machine_name']) return $entity[$propertyName];
        return null;
    }

    public static function getRoleId($machine_name)
    {
        return UserService::getRoleProperty($machine_name);
    }

    public static function createUser($email, $password, $name, $role_id = self::ROLE_ID_USER)
    {
        return User::create(
            [
                'email' => $email,
                'password' => Hash::make($password),
                'name' => $name,
                'role_id' => $role_id
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
