<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Book;
use App\Models\Commentbook;
use App\Models\Commentcreative;
use App\Models\Creative;
use Illuminate\Http\Request;

class CommentbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        return view("book/index", compact("comments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("book/show");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $request->validate([
            "text"=>"required|string"
        ]);
        $comments = new Commentbook();
        $comments->text=nl2br($request->text);
        
        $comments->user_id = auth()->id();
        $comments->book_id = $book->id;
        $comments->save();
        return redirect()->route("books.show", $book)->with("success","");
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
