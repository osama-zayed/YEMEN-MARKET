<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('superadmin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->usertype == "merchant") {
            $id = auth()->user()->id;
            $data = DB::select("SELECT merchants.* FROM `merchants`,`users` WHERE `merchants`.`user_id`=$id;");
            if (!empty($data))
                return view('admin.pages.merchant.Setting', ['data' => $data[0]]);
            else
                return view('admin.pages.merchant.create');
        }
        return view('admin.pages.Setting', ['data' => Setting::findOrFail(1)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->usertype == "merchant") {
            $request->validate([
                'name' => 'required',
                // 'logo' => 'required|image|mimes:png,jpg,svg',
                'email' => 'required|email',
                'phone' => 'required',
                'name_ar' => 'required',
                'adress' => 'required',
            ]);
            // dd($setteng_id);
            $to_updata = new merchant;
            $to_updata->name = strip_tags($request->input('name'));
            $to_updata->name_ar = strip_tags($request->input('name_ar'));
            $to_updata->image = strip_tags($request->input('logo'));
            $to_updata->email = strip_tags($request->input('email'));
            $to_updata->phone = strip_tags($request->input('phone'));
            $to_updata->adress = strip_tags($request->input('adress'));
            $to_updata->user_id = auth()->user()->id;
            if (!empty($request->description))
                $to_updata->description = strip_tags($request->input('description'));
            if (!empty($request->description_ar))
                $to_updata->description_ar = strip_tags($request->input('description_ar'));
            if (!empty($request->surname))
                $to_updata->surname = strip_tags($request->input('surname'));
            if (!empty($request->country))
                $to_updata->surname = strip_tags($request->input('country'));
            $to_updata->save();
        }
        return redirect()->route('Setting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $setteng_id)
    {
        if (auth()->user()->usertype == "merchant") {
            $request->validate([
                'name' => 'required',
                // 'logo' => 'required|image|mimes:png,jpg,svg',
                'email' => 'required|email',
                'phone' => 'required',
            ]);
            // dd($setteng_id);
            $to_updata = merchant::findOrFail($setteng_id);
            $to_updata->name = strip_tags($request->input('name'));
            $to_updata->description = strip_tags($request->input('description'));
            $to_updata->name_ar = strip_tags($request->input('name_ar'));
            $to_updata->description_ar = strip_tags($request->input('description_ar'));
            $to_updata->image = strip_tags($request->input('logo'));
            $to_updata->email = strip_tags($request->input('email'));
            $to_updata->phone = strip_tags($request->input('phone'));
            $to_updata->adress = strip_tags($request->input('adress'));
            $to_updata->surname = strip_tags($request->input('surname'));
            $to_updata->surname = strip_tags($request->input('country'));


            $to_updata->save();
            return redirect()->route('Setting.index');
        }
        //////////////////////////
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'logo' => 'required|image|mimes:png,jpg,svg',
            'favicon',
            'email' => 'required|email',
            'phone' => 'required',
            'facebook' => 'required',
        ]);
        $to_updata = Setting::findOrFail($setteng_id);
        $to_updata->name = strip_tags($request->input('name'));
        $to_updata->description = strip_tags($request->input('description'));
        $to_updata->name_ar = strip_tags($request->input('name_ar'));
        $to_updata->description_ar = strip_tags($request->input('description_ar'));
        $to_updata->logo = strip_tags($request->input('logo'));
        $to_updata->favicon = strip_tags($request->input('favicon'));
        $to_updata->email = strip_tags($request->input('email'));
        $to_updata->phone = strip_tags($request->input('phone'));
        $to_updata->address = strip_tags($request->input('address'));
        $to_updata->address_ar = strip_tags($request->input('address_ar'));
        $to_updata->dollar = strip_tags($request->input('dollar'));
        $to_updata->facebook = strip_tags($request->input('facebook'));
        $to_updata->twitter = strip_tags($request->input('twitter'));
        $to_updata->instagram = strip_tags($request->input('instagram'));
        $to_updata->youtube = strip_tags($request->input('youtube'));
        $to_updata->tiktok = strip_tags($request->input('tiktok'));

        $to_updata->save();
        return redirect()->route('Setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
