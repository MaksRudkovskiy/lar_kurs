<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetTable
{
    public function handle($request, Closure $next)
    {
        if (Session::has('table_type')) {
            $table_type = Session::get('table_type');
        }

        return $next($request);
    }
}