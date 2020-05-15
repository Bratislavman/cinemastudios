<?php

namespace App\Http\Middleware;

use Closure;
use App\Service\ErrorService;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->role_id == 1) return $next($request);
        return ErrorService::returnError403();
    }
}
