<?php

namespace App\Http\Controllers;

use App\Models\OfferImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OfferImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OfferImage $offerImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfferImage $offerImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $offerimageid)
    {
        if (auth()->user()->usertype == "merchant") {
            return Redirect::back();
        }
        $to_updata = offerimage::findOrFail($offerimageid);
        if (!empty($request->url))
            $to_updata->url = strip_tags($request->input('url'));
        if (!empty($request->image)) {
            $image = $request->input('image');
            $imageName = $request->image;
            $destinationPath = public_path('/images');
            $imagePath = "images/offer/" . $imageName;
            $to_updata->image = $imagePath;
        }
        $to_updata->save();
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfferImage $offerImage)
    {
        //
    }
}
