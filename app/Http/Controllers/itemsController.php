<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class itemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =item::all();
        return view('admin.prodect.create_items',['data'=> $data ]);
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
        $request->validate([
            'title'=>'required|alpha',
            'price'=>'required|integer',
            'TYPE'=>'required',
            'discount'=>'required',
        ]);
        $product =new item();
        $product->TITLE =strip_tags( $request->input('title'));
        $product->PRICE =strip_tags( $request->input('price'));
        $product->TAXES =strip_tags( $request->input('price'))*0.05;
        $product->ADS =strip_tags( $request->input('price'))*0.05;
        $product->DISCOUNT =strip_tags( $request->input('discount'));
        $product->TOTAL =  $product->PRICE+$product->TAXES+ $product->ADS-$product->DISCOUNT;
        $product->CATEGORY =strip_tags( $request->input('TYPE'));

        $product->save();
        return redirect()->route('dachbord.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(item $products)
    {
        // return view('admin.prodect.show_items',[
        //     "products"=>products::findOrfill($products)
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($produ)
    {
        return view('admin.prodect.edit_items',[
            "produc"=>item::findOrFail($produ)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $products)
    {
        {
            $request->validate([
                'title'=>'required|alpha',
                'price'=>'required|integer',
                'TYPE'=>'required',
                'discount'=>'required',
            ]);
            $to_updata = item::findOrFail($products);
            $to_updata->TITLE =strip_tags( $request->input('title'));
            $to_updata->PRICE =strip_tags( $request->input('price'));
            $to_updata->TAXES =strip_tags( $request->input('price'))*0.05;
            $to_updata->ADS =strip_tags( $request->input('price'))*0.05;
            $to_updata->DISCOUNT =strip_tags( $request->input('discount'));
            $to_updata->TOTAL =  $to_updata->PRICE+$to_updata->TAXES+ $to_updata->ADS-$to_updata->DISCOUNT;
            $to_updata->CATEGORY =strip_tags( $request->input('TYPE'));

            $to_updata->save();
            return redirect()->route('dachbord.index');

    }

    /**
     * Remove the specified resource from storage.
     */

    // public function destroy(products $products)
    // {
    //     //
    // }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($products)
    {
        $to_delete = item::findOrFail($products);
        $to_delete ->delete();
        return redirect()->route('dachbord.index');
    }
}
