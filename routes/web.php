<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchbookController;
use App\Http\Controllers\WishController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', [PostController::class,'create'])->middleware(["auth", "verified"])->name('post.create');
    Route::get('/posts/mine', [PostController::class,'mine'])->middleware(["auth", "verified"])->name('post.mine');
    Route::post('/posts/store', [PostController::class,'store'])->middleware(["auth", "verified"])->name('post.store');

});


Route::get("/", function() {
    return view("books/index");
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

Route::get("/wish", [WishController::class,"index"])->name("wish.index")->middleware("admin");
Route::get("/wish/create", [WishController::class,"create"])->name("wish.create");
Route::post("/wish/store", [WishController::class,"store"])->name("wish.store");

require __DIR__.'/auth.php';
