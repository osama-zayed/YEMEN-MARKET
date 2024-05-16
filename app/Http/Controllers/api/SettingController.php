<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }
    public function index()
    {
        return response()->json(['Setting' => DB::select('SELECT * FROM `settings` WHERE 1')]);
    }
    public function update(Request $request)
    {
        $request->validate([
            // 'description' => 'required',
            // 'logo' => 'required|image|mimes:png,jpg,svg',
            // 'favicon',
            // 'email' => 'required|email',
            // 'phone' => 'required',
            // 'facebook' => 'required',
        ]);
        // DB::update('update users set votes = 100 where name = ?', ['John']); ('UPDATE `settings` SET `id`,`name`,`description`'[value-3]',`logo`='[value-4]',`favicon`='[value-5]',`email`='[value-6]',`phone`='[value-7]',`address`='[value-8]',`facebook`='[value-9]',`twitter`='[value-10]',`instagram`='[value-11]',`youtube`='[value-12]',`tiktok`='[value-13]',`created_at`='[value-14]',`updated_at`='[value-15]' WHERE id= 1');
        $to_updata = Setting::findOrFail(1);
        $to_updata->name = strip_tags($request->input('name'));
        // $to_updata->name = $request->name;
        $to_updata->description = strip_tags($request->input('description'))??$to_updata->description;
        // $to_updata->logo = strip_tags($request->input('logo'))??$to_updata->logo;
        // $to_updata->favicon = strip_tags($request->input('favicon'))??$to_updata->favicon;
        // $to_updata->email = strip_tags($request->input('email'))??$to_updata->email;
        // $to_updata->phone = strip_tags($request->input('phone'))??$to_updata->phone;
        // $to_updata->address = strip_tags($request->input('address'))??$to_updata->address;
        // $to_updata->facebook = strip_tags($request->input('facebook'))??$to_updata->facebook;
        // $to_updata->twitter = strip_tags($request->input('twitter'))??$to_updata->twitter;
        // $to_updata->instagram = strip_tags($request->input('instagram'))??$to_updata->instagram;
        // $to_updata->youtube = strip_tags($request->input('youtube'))??$to_updata->youtube;
        // $to_updata->tiktok = strip_tags($request->input('tiktok'))??$to_updata->tiktok;
        $flag = $to_updata->save();
        if ($flag) {
            $response = array("code" => 200, "message" => "updated successfully");
        } else {
            $response = array("code" => 400, "message" => "updated fild");
        }
        return response()->json($response);
    }

}
