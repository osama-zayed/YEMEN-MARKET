<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;

class CurrencysController extends Controller
{
    public function switCurrency($curr)
    {
        Session::start();
        Session()->put('appCurrency',$curr);
        // dd(Session()->get('appCurrency'));
        return Redirect::back();
    }
}
