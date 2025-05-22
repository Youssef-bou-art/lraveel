<?php

// app/Http/Middleware/CheckAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
             return redirect('/dashboard');// إذا كان المستخدم هو Admin، نسمح له بالدخول إلى Dashboard
            return $next($request);
        }

        // إذا لم يكن Admin، نعيد توجيهه إلى الـ Home
        return redirect('/home');
    }
}

