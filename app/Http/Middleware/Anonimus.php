<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Auth;

class Anonimus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() == false) return $next($request);
        return ResponseService::error403();
    }
}
