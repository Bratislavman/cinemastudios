<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Auth;

class Authorized
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) return $next($request);
        return ResponseService::error403();
    }
}
