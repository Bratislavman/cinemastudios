<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class Main extends Controller
{
    public function auth(Request $request)
    {
        return UserService::getUserMinifinedById();
    }
}
