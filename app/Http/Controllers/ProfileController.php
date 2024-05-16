<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        if (Auth::id()) {
            $usertype = auth()->user()->usertype;
            if ($usertype == 'superadmin' || $usertype == 'admin') {
                return view('admin.pages.user.users', ['Alluser' => User::all()]);
            } else {
                return redirect()->back();
            }
        }
    }
    public function create()
    {
        if (Auth::id()) {
            $usertype = auth()->user()->usertype;
            if ($usertype == 'superadmin' || $usertype == 'admin') {
                return view('admin.pages.user.createUser', ['Alluser' => User::all()]);
            } else {
                return redirect()->back();
            }
        }
    }
    public function store(Request $request)
    {
        if (Auth::id()) {
            $usertype = auth()->user()->usertype;
            if ($usertype == 'superadmin' || $usertype == 'admin') {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|string|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'usertype' => 'required',
                ]);
                $user = new User();
                $user->name = strip_tags($request->input('name'));
                $user->email = strip_tags($request->input('email'));
                $user->password = Hash::make($request->input('password'));
                $user->usertype = strip_tags($request->input('usertype'));
                $user->save();
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }

    }
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        if (Auth::id()) {
            $usertype = auth()->user()->usertype;
            if (!empty($request->user_id) && ($usertype == 'superadmin' || $usertype == 'admin')) {
                return view('admin.pages.user.profile', ['Alluser' => User::findOrFail($request->user_id)]);
            } else if ($usertype == 'superadmin' || $usertype == 'admin') {
                return view('admin.pages.user.profile', ['Alluser' => User::findOrFail(auth()->user()->id)]);
            } else if (auth()->user()->usertype == 'user'||auth()->user()->usertype == 'merchant') {
                return view('profile.edit');
            } else {
                return redirect()->back();
            }
        }
        return view('index');
    }


    public function update(Request $request)
    {
        if (Auth::id()) {
            $usertype = auth()->user()->usertype;
            if ($usertype == 'superadmin' || $usertype == 'admin') {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|string|max:255',
                    'password' => 'required|string|min:8|confirmed',
                    'usertype' => 'required',
                    'old_password' => 'required|string|min:8'
                ]);
                $to_updata = User::findOrFail($request->user_id);
                if (Hash::check($request->input('old_password'), $to_updata->password)) {
                    $to_updata->name = strip_tags($request->input('name'));
                    $to_updata->email = strip_tags($request->input('email'));
                    $to_updata->password = Hash::make($request->input('password'));
                    $to_updata->usertype = strip_tags($request->input('usertype'));
                    $to_updata->save();
                    return redirect()->route('profile.index');
                } else {
                    $request->validate([
                        'old_password' => 'confirmed'
                    ]);
                }
            } else if ($usertype == 'user' ||$usertype == 'merchant' ) {
                $request->validate([
                    'name' => "required",
                    'email' => "required|email",
                ]);
                $to_updata = User::findOrFail(auth()->user()->id);

                $to_updata->name = strip_tags($request->input('name'));
                $to_updata->email = strip_tags($request->input('email'));
                $to_updata->save();
                return back()->withStatus(__('Profile successfully updated.'));
            }
        }
    }


    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $to_updata = User::findOrFail(auth()->user()->id);
        if (Hash::check($request->input('old_password'), $to_updata->password)) {
            $request->validate([
                'old_password' => 'confirmed'
            ]);
            $to_updata->name = strip_tags($request->input('name'));
            $to_updata->email = strip_tags($request->input('email'));
            $to_updata->password = Hash::make($request->input('password'));
            $to_updata->save();
        }
        return back()->withStatus(__('Profile successfully updated.'));
    }
    public function delete(Request $request)
    {
        if (!empty($request->user_id)) {
            $to_delete = User::findOrFail($request->user_id);
            $to_delete->delete();
            return redirect()->route('profile.index');
        }
    }
}
