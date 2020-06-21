<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class bisnis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session()->exists('email')) {
            Alert::warning('Silanhkan Login Terlebih Dahulu');
            return redirect('/login');
        }
        return $next($request);
    }
}
