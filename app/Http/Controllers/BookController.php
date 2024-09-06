<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'lang' => 'required|string',
            'author' => 'required|string',
            'category' => 'required|string',
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
            'pdf_file' => 'required|file|mimes:pdf|max:20480',
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->description = $request->description;
        $book->lang = $request->lang;
        $book->author = $request->author;
        $book->category = $request->category;
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filePath = $file->store('books', 'public');
            $book->pdf_file = $filePath;
        }
        if($request->hasFile("image")) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }


        $book->save();

        return redirect()->route('books.index')->with('success', 'Book uploaded successfully.');
    }

    public function index()
    {
        $books = Book::all();
        $randomBooks = Book::inRandomOrder()->take(5)->get();

        return view('books.index', compact('books', 'randomBooks'));
    }
    public function show(Request $request, $id)
    {
        $book = Book::where("id", $id)->first();
        return view("books.show", compact("book"));
    }
    public function fiction()
    {
        $books = Book::all();
        return view('books.category.fiction', compact('books'));
    }
    public function nonfiction()
    {
        $books = Book::all();
        return view('books.category.non-fiction', compact('books'));
    }
    public function science()
    {
        $books = Book::all();
        return view('books.category.science', compact('books'));
    }
    public function history()
    {
        $books = Book::all();
        return view('books.category.history', compact('books'));
    }
    public function travel()
    {
        $books = Book::all();
        return view('books.category.travel', compact('books'));
    }
    public function drama()
    {
        $books = Book::all();
        return view('books.category.drama', compact('books'));
    }
    public function art()
    {
        $books = Book::all();
        return view('books.category.art', compact('books'));
    }
    public function mystery()
    {
        $books = Book::all();
        return view('books.category.mystery', compact('books'));
    }
    public function horror()
    {
        $books = Book::all();
        return view('books.category.horror', compact('books'));
    }
    public function romance()
    {
        $books = Book::all();
        return view('books.category.romance', compact('books'));
    }
}
