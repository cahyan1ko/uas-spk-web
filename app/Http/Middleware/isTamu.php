<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class isTamu
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (session()->has('password_reset')) {
                session()->forget('password_reset');
                Session::flush(); // Menghapus semua sesi
                return redirect('/login');
            }
            return redirect('/home');
        }
        return $next($request);
    }
}
