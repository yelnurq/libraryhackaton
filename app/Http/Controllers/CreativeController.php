<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Tag;

    use Illuminate\Support\Facades\Storage;
    use App\Http\Requests\UpdatePostRequest;
    use App\Models\Comment;
use App\Models\Creative;
use Illuminate\Http\Request;

    class CreativeController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $posts = Creative::paginate(15);
            return view('creative.index', ['posts' => $posts]);
        }
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view("creative.index");
        }
        public function mine()
        {
            $posts = auth()->user()->posts()->paginate(10);
            return view("creative/mine", compact("posts"));
        }


        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
                "main"=> "string",
            ]);

            $post = new Creative();
            $post->user_id = auth()->id();
            $post->main = $request->main;
            if($request->hasFile("image")) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }

            $post->save();
            return redirect()->route("creative.index");
        }







        /**
         * Display the specified resource.
         */
        public function show(Creative $creative, $id)
        {
            $creative = Creative::where("id", $id)->first();
            return view("creative/show", compact("creative"));
        }


        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Post $post)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdatePostRequest $request, Post $post)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Post $post)
        {
            //
        }
    }
