<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductColorSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'show_cart']]);
    }
    public function index()
    {
        return response()->json(
            DB::select("SELECT id,name,name_ar,description,description_ar,image,price,discount_price,category_id,merchant_id,offer FROM `products` ")
        );
    }
    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        if (empty(DB::select("SELECT * FROM `products` WHERE id = $request->id"))) {
            return response()->json(array("code" => 400, "message" => "not found"));
        } else {
            return response()->json([
                "product" => DB::select("SELECT * FROM `products` WHERE id = $request->id"),
                "color" => DB::select("SELECT id,color  FROM `product_colors` WHERE  product_id=$request->id ;"),
                "size" => DB::select("SELECT  id,size FROM `product_sizes` WHERE  product_id=$request->id;")
            ]);
        }
    }
    public function show_cart(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        foreach ($request->product_cart as $requestid) {
            $x[$requestid] = [
                "product" => DB::select("SELECT * FROM `products` WHERE id = $requestid"),
                "color" => DB::select("SELECT id,color  FROM `product_colors` WHERE  product_id=$requestid ;"),
                "size" => DB::select("SELECT  id,size FROM `product_sizes` WHERE  product_id=$requestid;")
            ];
        }
        return response()->json($x);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $Product = Product::findOrFail($request->id);
        // $Product->parent_id = strip_tags($request->input('parent_id'));
        if (!empty($request->image)) {
            $image = $request->input('image');
            $imageName = $request->image;
            $destinationPath = public_path('/images');
            // $image->move($destinationPath, $imageName);
            $imagePath = "images/Product/" . $imageName;
            // dd($imagePath);
            $Product->image = $imagePath;
        }
        $Product->description = strip_tags($request->input('description'));
        $Product->parent_id = strip_tags($request->input('parent_id'));
        // $Product->price = strip_tags($request->input('price'));
        // $Product->discount_price = strip_tags($request->input('discount_price'));
        $flag = $Product->save();
        if ($flag) {
            $response = array("code" => 200, "message" => "updated successfully");
        } else {
            $response = array("code" => 400, "message" => "updated fild");
        }
        return response()->json($response);
    }
    public function store(Request $request)
    {
        //

        // public function store(Request $request)
        // {
        //
        //     dd($request->parent_id);
        //     $request->validate([
        //         'name' => 'required',
        //         'description' => 'required',
        //     ]);
        //     $Product = new Product();
        //     $Product->name = strip_tags($request->input('name'));
        //     $image = $request->input('image');
        //     $imageName = $request->image;
        //     $destinationPath = public_path('/images');
        //     $imagePath = "images/Product/" . $imageName;
        //     $Product->image = $imagePath;
        //     $Product->description = strip_tags($request->input('description'));
        //     $Product->category_id = strip_tags($request->input('parent_id'));
        //     $Product->price = strip_tags($request->input('price'));
        //     $Product->discount_price = strip_tags($request->input('discount_price'));
        //     $Product->save();
        //     return redirect()->route('Product.index');
        // }

        //
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

    public function delete(Request $request)
    {
        $flag = Product::findOrFail($request->id)->delete();
        if ($flag) {
            $response = array("code" => 200, "message" => "deleted successfully");
        } else {
            $response = array("code" => 400, "message" => "deleted fild");
        }
        return response()->json($response);
    }
}
