<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('admin', ['except' => ['show']]);
        $this->middleware('superadmin', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->usertype == "merchant") {
            return Redirect::back();
        }
        $data = Category::all();
        return view('admin.pages.Category', ['data' => $data]);
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
            return Redirect::back();
        }
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'description' => 'required',
            'parent_id' => 'required',
        ]);
        $Category = new Category();
        // dd($request->input('parent_id'));
        $Category->name = strip_tags($request->input('name'));
        $Category->name_ar = strip_tags($request->input('name_ar'));
        $Category->parent_id = strip_tags($request->input('parent_id'));
        // $imageName=time().'-'.uniqid().'-'.$request->image->ex;
        // $Category->image =strip_tags($imageName);
        // dd($request->photo);
        // $request->image->move(public_path('images'), $imageName);
        $image = $request->input('image');
        $imageName = $request->image;
        $destinationPath = public_path('/images');
        // $image->move($destinationPath, $imageName);
        $imagePath = "images/Category/" . $imageName;
        // dd($imagePath);
        $Category->image = $imagePath;
        // $Category->description = strip_tags($request->input('description'));
        $flag = $Category->save();
        return redirect()->route('Category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->usertype == "merchant") {
            return Redirect::back();
        }
        return view('admin.pages.Category', [
            "Category_updata" => Category::findOrFail($id),
            "show_parent_id" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->usertype == "merchant") {
            return Redirect::back();
        }
        $request->validate([
            'name' => 'required',
            // 'image'=>'required',
            // 'description' => 'required',
        ]);
        $Category = Category::findOrFail($id);
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
        $Category->save();
        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->usertype == "merchant") {
            return Redirect::back();
        }
        $to_delete = Category::findOrFail($id);
        $to_delete->delete();
        return redirect()->route('Category.index');
    }
}
