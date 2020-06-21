<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class toko
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
        if (!session()->exists('toko')) {
            Alert::warning('Silanhkan Login Terlebih Dahulu');
            return redirect('/toko/login');
        }
        return $next($request);
    }
}
