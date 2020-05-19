<?php

namespace App\Http\Controllers\Auth;

use App\Service\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:20|unique:users',
            'password' => 'required|string|min:6|max:20|confirmed',
            'name' => 'required|string|min:2|max:20',
        ]);

        $user = UserService::createUser(
            $request->email,
            Hash::make($request->password),
            $request->name
        );

        Auth::loginUsingId($user->id);

        return UserService::userMinifined($user);
    }
}
