<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Tag;

    use Illuminate\Support\Facades\Storage;
    use App\Models\Post;
    use App\Http\Requests\UpdatePostRequest;
    use App\Models\Comment;
    use Illuminate\Http\Request;

    class PostController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $posts = Post::paginate(15);
            return view('posts.index', ['posts' => $posts]);
        }

        public function mine()
        {
            $tags = Tag::all();
            $posts = auth()->user()->posts()->paginate(10);
            return view("posts/mine", compact("posts", "tags"));
        }


        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                "title" => "required|string|max:250",
                "type" => "string",
                "main" => "string",
                "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
                "tags" => "nullable|array", // Теперь ожидаем массив тегов
            ]);

            $post = new Post();
            $post->title = $request->title;
            $post->type = $request->type;
            $post->main = $request->main;
            $post->user_id = auth()->id();

            if($request->hasFile("image")) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }

            if ($post->save()) {
                // Обработка тегов
                if ($request->tags) {
                    foreach ($request->tags as $tagId) {
                        $tag = Tag::find($tagId);
                        if ($tag) {
                            // Присоединяем тег к посту, если его еще нет у поста
                            if (!$post->tags->contains($tag->id)) {
                                $post->tags()->attach($tag->id);
                            }
                        }
                    }
                }
                return redirect()->route("post.index");
            } else {
                // Обработка ошибки сохранения поста
                dd($post->getErrors()); // Вывести ошибки сохранения поста
            }
        }



        public function search(Request $request, Post $posts)
        {
            $tags = Tag::all();
            $search = $request->input('search');

            if ($search === null || $search === '') {
                // Если поиск пустой, возвращаем все записи с пагинацией
                $results = $posts->paginate(15);
            } else {
                // Выполняем запрос с фильтрацией по названию и с пагинацией
                $results = $posts->where("title", "like", "%$search%")->paginate(15);
            }

            return view("posts/index", ['posts' => [], 'results' => $results, "tags"=>$tags]);
        }



        /**
         * Display the specified resource.
         */
        public function show(Post $post)
        {
            $tags = Tag::all();
            $total = $post->comments()->count();
            return view("posts/show", compact("post", "total", "tags"));
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
