<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:20',
            'password' => 'required|min:6|max:20',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) return UserService::getUserMinifined();
    }

    public function logout()
    {
        Auth::logout();
        return '';
    }
}
