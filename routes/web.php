<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentbookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentcreativeController;
use App\Http\Controllers\CreativeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchbookController;
use App\Http\Controllers\WishController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookUserStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/posts/mine', [PostController::class,'mine'])->middleware(["auth", "verified"])->name('post.mine');
    Route::post('/posts/store', [PostController::class,'store'])->middleware(["auth", "verified"])->name('post.store');
    
    Route::post('books/{book}/status', [BookUserStatusController::class, 'update'])->name('books.status.update');
    Route::get('books/{book}/status', [BookUserStatusController::class, 'show'])->name('books.status.show');
    Route::get('books/wishlist', [BookController::class, 'wishlist'])->name('books.wishlist');
    Route::get('books/finished', [BookController::class, 'finished'])->name('books.finished');
    Route::get('books/process', [BookController::class, 'process'])->name('books.process');
    Route::get('books/favorite', [BookController::class, 'favorite'])->name('books.favorite');
    Route::get('books/abandoded', [BookController::class, 'abandoded'])->name('books.abandoded');

});




Route::get('/community/posts', [PostController::class,'index'])->name('post.index');
Route::get("/community/posts/{post}", [PostController::class,'show'])->name("post.show");
Route::get("/support/rules", function () {
    $tags = Tag::all();
    return view("rules/rules", compact("tags"));
})->name("post.rules");
Route::get("support/polite", function () {
    $tags = Tag::all();
    return view("rules/polite", compact("tags"));
})->name("polites");
Route::post("/posts/delete", [PostController::class,'delete'])->name("post.delete");
Route::get('/search', [PostController::class, "search"])->name('post.search');
Route::post('/posts/{post}/attach-tags', [PostController::class, 'attachTags'])->name('posts.attachTags');

Route::get("/community", function(){
    return view("searchbooks.main");
})->name("searchbook.main");
Route::get("/community/books", [SearchbookController::class, "index"])->name("searchbook.index");
Route::post("/community/books/store", [SearchbookController::class, "store"])->name("searchbook.store");
Route::get("/community/books/search", [SearchbookController::class, "search"])->name("searchbook.search");

Route::get('/posts/{post}/comment', [CommentController::class,'index'])->name('comment.index');
Route::get('/posts/{post}/comment', [CommentController::class,'create'])->name('comment.create');
Route::post('/posts/{post}/comment/store', [CommentController::class,'store'])->name('comment.store');

Route::get('/creativeworks/{creative}/comment', [CommentcreativeController::class,'index'])->name('commentcreative.index');
Route::get('/creativeworks/{creative}/comment', [CommentcreativeController::class,'create'])->name('commentcreative.create');
Route::post('/creativeworks/{creative}/comment/store', [CommentcreativeController::class,'store'])->name('commentcreative.store');



Route::get("/wish", [WishController::class,"index"])->name("wish.index")->middleware("admin");
Route::get("/wish/create", [WishController::class,"create"])->name("wish.create");
Route::post("/wish/store", [WishController::class,"store"])->name("wish.store");
Route::post("/wish/{id}/destroy", [WishController::class,"destroy"])->name("wish.destroy");


Route::get("/creativeworks/", [CreativeController::class, "index"])->name("creative.index");
Route::post("/creativeworks/store", [CreativeController::class, "store"])->name("creative.store");
Route::get("/creativeworks/{post}", [CreativeController::class, "show"])->name("creative.show");


Route::get('admin/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('admin/books', [BookController::class, 'store'])->name('books.store');

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::get('/books/{book}/comment', [CommentbookController::class,'index'])->name('commentbook.index');
Route::get('/books/{book}/comment', [CommentbookController::class,'create'])->name('commentbook.create');
Route::post('/books/{book}/comment/store', [CommentbookController::class,'store'])->name('commentbook.store');

Route::get('/books/category/fiction', [BookController::class, 'fiction'])->name('books.fiction');
Route::get('/books/category/nonfiction', [BookController::class, 'nonfiction'])->name('books.nonfiction');
Route::get('/books/category/history', [BookController::class, 'history'])->name('books.history');
Route::get('/books/category/travel', [BookController::class, 'travel'])->name('books.travel');
Route::get('/books/category/science', [BookController::class, 'science'])->name('books.science');
Route::get('/books/category/health', [BookController::class, 'health'])->name('books.health');
Route::get('/books/category/drama', [BookController::class, 'drama'])->name('books.drama');
Route::get('/books/category/art', [BookController::class, 'art'])->name('books.art');
Route::get('/books/category/mystery', [BookController::class, 'mystery'])->name('books.mystery');
Route::get('/books/category/horror', [BookController::class, 'horror'])->name('books.horror');
Route::get('/books/category/romance', [BookController::class, 'romance'])->name('books.romance');
Route::get('/books/category/classic', [BookController::class, 'classic'])->name('books.classic');
Route::get('/books/category/selfhelp', [BookController::class, 'selfhelp'])->name('books.selfhelp');
Route::get('/books/category/cooking', [BookController::class, 'cooking'])->name('books.cooking');
Route::get('/books/category/children', [BookController::class, 'children'])->name('books.children');
Route::get('/books/category/fantasy', [BookController::class, 'fantasy'])->name('books.fantasy');
Route::get('/books/category/new', [BookController::class, 'new'])->name('books.new');
Route::get('/books/category/popular', [BookController::class, 'popular'])->name('books.popular');




require __DIR__.'/auth.php';
