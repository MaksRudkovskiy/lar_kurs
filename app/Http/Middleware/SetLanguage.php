<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if (Session::has('language')) {
            $language = Session::get('language');
            App::setLocale($language);
            // Добавьте отладочную информацию   
        }

        return $next($request);
    }
}