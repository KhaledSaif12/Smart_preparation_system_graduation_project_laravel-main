<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Facade;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
   // protected $addHttpCookie=false;
    protected $except = [
        //
    ];
    /*public function handle($request, Closure $next)
    {

    }*/
}
