<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        return view("posts/index", compact("comments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $count = Comment::sum();
        return view("posts/show", compact("count"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            "text"=>"required|string"
        ]);
        $comments = new Comment();
        $comments->text=nl2br($request->text);
        
        $comments->user_id = auth()->id();
        $comments->post_id = $post->id;
        $comments->save();
        return redirect()->route("post.show", $post)->with("success","");
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
