<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth', ['except' => ['show_cart']]);
        $this->middleware('merchant', ['except' => ['show_cart']]);
        $this->middleware('admin', ['except' => ['show_cart']]);
        $this->middleware('superadmin', ['except' => ['show_cart']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->user()->usertype == "superadmin" || auth()->user()->usertype == "admin") {
            return view(
                'admin.pages.Product.Product',
                [
                    'Category' => DB::select('SELECT * FROM `categories`'),
                    'Product' =>  Product::all(),
                    'ProductColor' =>  ProductColor::all(),
                    'ProductSize' =>  ProductSize::all(),
                    'ProductColorSize' =>  ProductColorSize::all(),
                ]
            );
        } else if (auth()->user()->usertype == "merchant") {
            $id =auth()->user()->id;
            return view(
                'admin.pages.Product.Product',
                [
                    'Category' => DB::select('SELECT * FROM `categories`'),
                    'Product' =>  DB::select("SELECT * FROM `products` WHERE `merchant_id` = $id"),
                    'ProductColor' =>  ProductColor::all(),
                    'ProductSize' =>  ProductSize::all(),
                    'ProductColorSize' =>  ProductColorSize::all(),
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = [1, 6, 5];
        foreach ($id as $requestid) {
            $x[$requestid] = [
                "product" => DB::select("SELECT * FROM `products` WHERE id = $requestid"),
                "color" => DB::select("SELECT id,color  FROM `product_colors` WHERE  product_id=$requestid ;"),
                "size" => DB::select("SELECT  id,size FROM `product_sizes` WHERE  product_id=$requestid;")
            ];
        }
        dd($x);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $Product = new Product();
        $Product->name = strip_tags($request->input('name'));
        $Product->name_ar = strip_tags($request->input('name_ar'));
/////////move image to folder and store data bise////////
        $imageName =uniqid()."_" .$Product->name.'.'.$request->image->extension();
        $request->image->move(public_path("images/Product/"),$imageName);
        $imagePath = "images/Product/" . $imageName;
        $Product->image = $imagePath;

        $Product->description = strip_tags($request->input('description'));
        $Product->description_ar = strip_tags($request->input('description_ar'));
        $Product->category_id = strip_tags($request->input('parent_id'));
        $Product->price = strip_tags($request->input('price'));
        $Product->merchant_id = Auth()->user()->id;
        if ($request->input('discount_price') >= 20) {
            $Product->offer = 1;
        } else {
            $Product->offer = 0;
        }
        $Product->discount_price = strip_tags($request->input('discount_price'));
        $Product->save();
        return redirect()->route('Product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {

        if (!empty($request->input("color"))) {
            foreach ($request->input("color") as $key => $value) {
                DB::insert("INSERT INTO `product_colors`( `product_id`, `color` ) VALUES ( '$id', '$value')");
            }
        }
        if (!empty($request->input("size"))) {
            foreach ($request->input("size") as $key => $value) {
                DB::insert("INSERT INTO `product_sizes`( `product_id`, `size` ) VALUES ( '$id', '$value')");
            }
        }

        return redirect()->route('Product.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view(
            'admin.pages.Product.editProduct',
            [
                'Category' =>  Category::all(),
                'Product' =>  Product::findOrFail($id),
                'ProductColor' =>  ProductColor::all(),
                'ProductSize' =>  ProductSize::all(),
                'ProductColorSize' =>  ProductColorSize::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $Product = Product::findOrFail($id);
        $Product->name = strip_tags($request->input('name'));
        $Product->name_ar = strip_tags($request->input('name_ar'));
        if (!empty($request->image)) {
            $imageName =uniqid()."_" .$Product->name.'.'.$request->image->extension();
            $request->image->move(public_path("images/Product/"),$imageName);
            $imagePath = "images/Product/" . $imageName;
            $Product->image = $imagePath;
        }
        $Product->merchant_id = Auth()->user()->id;
        if ($request->input('discount_price') >= 20) {
            $Product->offer = 1;
        } else {
            $Product->offer = 0;
        }
        $Product->description = strip_tags($request->input('description'));
        $Product->description_ar = strip_tags($request->input('description_ar'));
        $Product->category_id = strip_tags($request->input('parent_id'));
        $Product->price = strip_tags($request->input('price'));
        $Product->discount_price = strip_tags($request->input('discount_price'));
        $Product->save();
        return redirect()->route('Product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $to_delete = Product::findOrFail($id);
        $to_delete->delete();
        return redirect()->route('Product.index');
    }
}
