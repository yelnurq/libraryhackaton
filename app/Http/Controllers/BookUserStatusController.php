<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BookUserStatus;

class BookUserStatusController extends Controller
{
    /**
     * Показывает статус книги для текущего пользователя.
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
     * Обновляет статус книги для текущего пользователя.
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
            // Обновить существующий статус
            $status->update([
                'status' => $request->input('status')
            ]);
        } else {
            // Создать новый статус
            BookUserStatus::create([
                'user_id' => $user->id,
                'book_id' => $bookId,
                'status' => $request->input('status')
            ]);
        }

        return redirect()->back()->with('success', 'Статус книги обновлен!');
    }
}
