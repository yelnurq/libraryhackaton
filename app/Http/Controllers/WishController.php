<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Wish;
use App\Http\Requests\StoreWishRequest;
use App\Http\Requests\UpdateWishRequest;
use Illuminate\Http\Request;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        $wish = Wish::all();
        return view("wish/index", compact("wish", "tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view("wish/create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "wishtext"=>"string"
        ]);
        $wish = new Wish;
        $wish->wishtext = $request->wishtext;
        $wish->user_id = auth()->id();
        $wish->save();
        return redirect()->route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Wish $wish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wish $wish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishRequest $request, Wish $wish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wish $wish)
    {
        //
    }
}
