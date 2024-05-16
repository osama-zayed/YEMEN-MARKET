<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::id()) {
            $usertype = auth()->user()->usertype;
            if ($usertype == 'superadmin'||$usertype == 'admin') {
                return view('admin.home',["AllCategory"=>Category::all(),"AllProduct"=>Product::all()]);
            }
            else if ($usertype == 'user') {
                return view('home');
            } else {
                return redirect()->back();
            }
        }
        return view('index');
    }
}
