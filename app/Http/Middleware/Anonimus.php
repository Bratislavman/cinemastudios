<?php

namespace App\Http\Middleware;

use Closure;
use App\Service\ErrorService;
use Illuminate\Support\Facades\Auth;

class Anonimus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() == false) return $next($request);
        return ErrorService::returnError403();
    }
}
