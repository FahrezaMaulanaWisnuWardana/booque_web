<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // baru

class Cek_login
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('booque-login');
        }
        if(Auth::user())
            return $next($request);
    }
}
