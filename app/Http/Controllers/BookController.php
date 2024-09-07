<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
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
        $book = Book::where('id', $id)->first();
    
        if (Auth::check()) { // Ensure the user is authenticated
            $user = Auth::user();
            $userStatus = $user->bookStatuses()->where('book_id', $id)->first(); // Assuming 'book_id' is the foreign key
        } else {
            $userStatus = null;
        }
    
        return view('books.show', compact('book', 'userStatus'));
    }
    public function wishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $wishlistBooks = $user->bookStatuses()->where('status', 'хочу прочитать')->with('book')->get();

        return view('books.wishlist', compact('wishlistBooks'));
    }
    public function finished()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $finishedBooks = $user->bookStatuses()->where('status', 'прочитано')->with('book')->get();

        return view('books.ended', compact('finishedBooks'));
    }    
    public function process()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $processBooks = $user->bookStatuses()->where('status', 'в процессе')->with('book')->get();

        return view('books.process', compact('processBooks'));
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
    public function fantasy()
    {
        $books = Book::all();
        return view('books.category.fantasy', compact('books'));
    }
    public function children()
    {
        $books = Book::all();
        return view('books.category.children', compact('books'));
    }
    public function cooking()
    {
        $books = Book::all();
        return view('books.category.cooking', compact('books'));
    }
    public function selfhelp()
    {
        $books = Book::all();
        return view('books.category.selfhelp', compact('books'));
    }
}
