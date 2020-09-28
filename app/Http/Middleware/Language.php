<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;

class Language
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
        if (Session::has('locale')) {
            $locale=Session::get('locale');
        }else{
            $locale='ru';
        }
        \App::setLocale($locale);
        return $next($request);
    }
}
