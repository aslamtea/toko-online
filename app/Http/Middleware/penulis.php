<?php

namespace App\Http\Middleware;

use RealRashid\SweetAlert\Facades\Alert;

use Closure;

class penulis
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
        if (!session()->exists('penulis_id')) {
            Alert::warning('Silanhkan Login Terlebih Dahulu');
            return redirect('/penulis/login');
        }
        return $next($request);
    }
}
