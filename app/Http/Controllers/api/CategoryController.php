<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show',"showSons"]]);
    }
    public function index()
    {
        return response()->json(
            // [
            // "code" => 200, "message" => "successfully",
            // "data"=>
            DB::select('SELECT id ,name ,name_ar ,description ,description_ar ,image ,parent_id FROM `categories`')
        // ]
    );
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'description' => 'required',
            'parent_id' => 'required',
        ]);
        $Category = new Category();
        $Category->name = strip_tags($request->input('name'));
        $Category->parent_id = strip_tags($request->input('parent_id'));
        $image = $request->input('image');
        $imageName = $request->image;
        $destinationPath = public_path('/images');
        $imagePath = "images/Category/" . $imageName;
        $Category->image = $imagePath;
        $Category->description = strip_tags($request->input('description'));
        $flag = $Category->save();
        if ($flag) {
            $response = array("code" => 200, "message" => "created successfully");
        } else {
            $response = array("code" => 400, "message" => "created fild");
        }
        return response()->json($response);
    }
    public function showSons(Request $request)
    {
        if (empty(DB::select("SELECT * FROM `categories` WHERE parent_id = $request->id"))) {
            return response()->json(array("code" => 400, "message" => "not found"));
        } else {
            return response()->json(DB::select("SELECT * FROM `categories` WHERE `parent_id` = $request->id"));
        }
    }
    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        if (empty(DB::select("SELECT * FROM `categories` WHERE id = $request->id"))) {
            return response()->json(array("code" => 400, "message" => "not found"));
        } else {
            return response()->json(Category::findOrFail($request->id));
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image'=>'required',
        ]);
        $Category = Category::findOrFail($request->id);
        $Category->parent_id = strip_tags($request->input('parent_id'));
        if (!empty($request->image)) {
            $image = $request->input('image');
            $imageName = $request->image;
            $destinationPath = public_path('/images');
            // $image->move($destinationPath, $imageName);
            $imagePath = "images/Category/" . $imageName;
            // dd($imagePath);
            $Category->image = $imagePath;
        }
        $Category->name = strip_tags($request->input('name'));
        // $Category->image = strip_tags($request->input('image'));
        $Category->description = strip_tags($request->input('description'));
        $flag = $Category->save();
        if ($flag) {
            $response = array("code" => 200, "message" => "updated successfully");
        } else {
            $response = array("code" => 400, "message" => "updated fild");
        }
        return response()->json($response);
    }
    public function delete(Request $request)
    {
        $flag = Category::findOrFail($request->id)->delete();
        if ($flag) {
            $response = array("code" => 200, "message" => "deleted successfully");
        } else {
            $response = array("code" => 400, "message" => "deleted fild");
        }
        return response()->json($response);
    }
}
