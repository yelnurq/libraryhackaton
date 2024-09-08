<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session("cart", []);
        return view("cart/index", ["cart" => $cart]);
    }

    public function add_to_cart(Request $request, $bookId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $book = Book::findOrFail($bookId);
        $quantity = $request->input('quantity');
        $cart = session('cart', []);

        if (isset($cart[$bookId])) {
            $cart[$bookId]['quantity'] += $quantity;
        } else {
            $cart[$bookId] = [
                'book_id' => $book->id,
                'title' => $book->title,
                'quantity' => $quantity,
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Успешно');
    }


    public function clear(Request $request)
    {
        session()->forget("cart");
        return redirect()->route("cart.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $cart = session('cart', []);

        $order = new Order();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->cart = json_encode($cart); 
        $order->status = 'reserved'; 
        $order->user_id = auth()->user()->id;
        $order->save();

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Успешно');
    }

    public function order(Request $request)
    {
        $orders = Order::all();
    
        foreach ($orders as $order) {
            $cart = json_decode($order->cart, true);
            $order->book_titles = array_map(function ($item) {
                return $item['title'];
            }, $cart);
        }
    
        return view("orders.index", compact("orders"));
    }
    
    public function mine(Request $request)
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        foreach ($orders as $order) {
            $cart = json_decode($order->cart, true);
            $order->books = array_map(function ($item) {
                return $item['title'];
            }, $cart);
        }
        return view("orders.mine", compact("orders"));
    }

    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $status = $request->input('status');

        $validStatuses = ['reserved', 'ready', 'picked_up', 'canceled'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->withErrors('Ошибка.');
        }

        $order->status = $status;
        $order->save();

        return redirect()->back()->with('success', 'Успешно');
    }
}
