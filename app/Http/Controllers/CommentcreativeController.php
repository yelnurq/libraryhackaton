<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Commentcreative;
use App\Models\Creative;
use Illuminate\Http\Request;

class CommentcreativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        return view("creative/index", compact("comments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("creative/show");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Creative $creative)
    {
        $request->validate([
            "text"=>"required|string"
        ]);
        $comments = new Commentcreative();
        $comments->text=nl2br($request->text);
        
        $comments->user_id = auth()->id();
        $comments->creative_id = $creative->id;
        $comments->save();
        return redirect()->route("creative.show", $creative)->with("success","");
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
