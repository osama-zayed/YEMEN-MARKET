<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{
    public function cart()
    {
        return view('pages.cart_page');
    }
    public function Favorite()
    {
        return view('pages.Favorite');
    }
    public function prodect(Request $request)
    {
        // dd(["product"=>DB::select("SELECT * FROM `products` WHERE id = $request->id")]);
        // dd([ "reviewstar" => DB::select("SELECT `products`.`id`, `products`.`name`, `products`.`name_ar`, `products`.`description`, `products`.`description_ar`, `products`.`image`, `products`.`price`, `products`.`discount_price`, `products`.`category_id` ,AVG(`reviews`.`rating`) AVG,COUNT(`reviews`.`rating`) COUNT FROM `products` ,`reviews` WHERE `products`.category_id = (SELECT category_id FROM `products` WHERE id = 1) AND `products`.id =`reviews`.product_id GROUP BY `products`.`id`;")]);
        return view('pages.prodect', [
            "products" => DB::select("SELECT * FROM `products` WHERE id = $request->id "),
            "Alsoproducts" => DB::select("SELECT * FROM `products` WHERE category_id = (SELECT category_id FROM `products` WHERE id = $request->id)"),
            "Alsoproductreview" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),
            "review" => DB::select("SELECT * FROM `reviews` WHERE product_id = $request->id"),
            "reviewstar" => DB::select("SELECT AVG(rating) AVG ,COUNT(rating) COUNT FROM `reviews` WHERE product_id = $request->id"),
            "color" => DB::select("SELECT id,color  FROM `product_colors` WHERE  product_id=$request->id ;"),
            "size" => DB::select("SELECT  id,size FROM `product_sizes` WHERE  product_id=$request->id;")
        ]);
    }
    public function merchant(Request $request)
    {
        // dd($request->id);

        // dd(DB::select("SELECT * FROM `categories` WHERE  `parent_id` = $request->id ;"));
        return view('pages.Category', [
            "Category_show" => DB::select("SELECT * FROM `products` WHERE merchant_id = $request->id ;"),
            // "product" => product::select("*")->orderby("id","ASC")->paginate(1),
            // "product" => DB::select("SELECT * FROM `products` ;"),
            // "Category_child" => DB::select("SELECT * FROM `categories` WHERE  `merchant_id` = $request->id ;"),
            "reviewstar" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),

        ]);
    }
    public function Category(Request $request)
    {
        // dd(DB::select("SELECT * FROM `categories` WHERE  `parent_id` = $request->id ;"));
        return view('pages.Category', [
            "Category_show" => DB::select("SELECT * FROM `products` WHERE category_id = $request->id ;"),
            // "product" => product::select("*")->orderby("id","ASC")->paginate(1),
            "product" => DB::select("SELECT * FROM `products` ;"),
            "Category_child" => DB::select("SELECT * FROM `categories` WHERE  `parent_id` = $request->id ;"),
            "reviewstar" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),

        ]);
    }
    public function ChildCategory(Request $request)
    {
        // dd(DB::select("SELECT * FROM `categories` WHERE  `parent_id` = $request->id ;"));
        return view('pages.Category', [
            "Category_show" => DB::select("SELECT * FROM `products` WHERE category_id = $request->id ;"),
            "reviewstar" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),

        ]);
    }
    public function Newst(Request $request)
    {
        // dd(date("d") );
        // dd(DB::select("SELECT * FROM `categories` WHERE  `parent_id` = $request->id ;"));
        return view('pages.Category', [
            "Category_show" => DB::select("SELECT * FROM `products`"),
            "reviewstar" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),

        ]);
    }
    public function sale(Request $request)
    {
        // dd(DB::select("SELECT * FROM `products`  ;"));
        return view('pages.Category', [
            // "product" => product::select("*")->orderby("id","ASC")->paginate(1),
            "Category_show" => DB::select("SELECT * FROM `products` WHERE offer = 1  ;"),
            "reviewstar" => DB::select("SELECT `products`.id , AVG(`reviews`.rating) AVG ,COUNT(`reviews`.rating) COUNT FROM `reviews` ,`products` WHERE `products`.id =`reviews`.product_id GROUP BY `products`.id;"),
        ]);
    }
}
