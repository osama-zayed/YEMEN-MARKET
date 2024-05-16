<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            "rating" => "required",
            "comment" => "required|max:200"
        ]);
        $addreview = new Review();
        $addreview->product_id = strip_tags($request->input('id'));
        $addreview->user_id = strip_tags(auth()->user()->id);
        $addreview->user_name = strip_tags(auth()->user()->name);
        $addreview->rating = strip_tags($request->input('rating'));
        $addreview->comment = strip_tags($request->input('comment'));
        $addreview->save();
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
