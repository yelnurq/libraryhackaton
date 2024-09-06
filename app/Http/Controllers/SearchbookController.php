<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Tag;

    use Illuminate\Support\Facades\Storage;
    use App\Models\Searchbook;
    use App\Http\Requests\UpdatePostRequest;
    use App\Models\Comment;
    use Illuminate\Http\Request;

    class SearchbookController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $posts = Searchbook::paginate(15); // Применение пагинации к запросу
            return view('searchbooks.index', ['posts' => $posts]);
        }
        /**
         * Show the form for creating a new resource.
         */



        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                "title" => "required|string|max:250",
                "main" => "string",
                "type" => "string",
                "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
                "author" => "string",
                "tel" => "string",
            ]);

            $post = new Searchbook();
            $post->title = $request->title;
            $post->main = nl2br($request->main);
            $post->type = $request->type;
            $post->user_id = auth()->id();
            $post->author = $request->author;
            $post->tel = $request->tel;
            if($request->hasFile("image")) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }
            $post->save();
            return redirect()->route("searchbook.index");
            }
        public function search(Request $request, Searchbook $searchbook)
        {
            $search = $request->input('search');

            if ($search === null || $search === '') {
                // Если поиск пустой, возвращаем все записи с пагинацией
                $results = $searchbook->paginate(15);
            } else {
                // Выполняем запрос с фильтрацией по названию и с пагинацией
                $results = $searchbook->where("title", "like", "%$search%")->paginate(15);
            }

            return view("searchbooks/index", ['searchbook' => [], 'results' => $results]);
        }



        /**
         * Display the specified resource.
         */


        /**
         * Show the form for editing the specified resource.
         */

    }
