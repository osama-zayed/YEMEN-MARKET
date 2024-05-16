<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Currency
{
    public function handle(Request $request, Closure $next)
    {
        if (Session()->has('appCurrency') ) {
            config(['app.Currency'=> Session()->get('appCurrency')]);
        } else {
            Session::start();
            Session()->put('appCurrency','YR');
            config(['app.Currency'=> Session()->get('appCurrency')]);
        }
        return $next($request);
    }
}
