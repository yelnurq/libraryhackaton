<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BookUserStatus;

class BookUserStatusController extends Controller
{
    /**
     *
     * @param  int  $bookId
     * @return \Illuminate\Http\Response
     */
    public function show($bookId)
    {
        $user = Auth::user();
        $status = $user->bookStatuses()->where('book_id', $bookId)->first();
        
        return view('book.status', compact('status', 'bookId'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $bookId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $status = $user->bookStatuses()->where('book_id', $bookId)->first();

        if ($status) {
            $status->update([
                'status' => $request->input('status')
            ]);
        } else {
            BookUserStatus::create([
                'user_id' => $user->id,
                'book_id' => $bookId,
                'status' => $request->input('status')
            ]);
        }

        return redirect()->back()->with('success', 'Статус книги обновлен!');
    }
}
