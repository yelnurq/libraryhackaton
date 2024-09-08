@extends('layouts.head')

@section('main')
<style>
    .cart-title {
        font-size: 23px;
        font-weight: 600;
        text-align: left;
        margin: 0;
        margin-bottom: 30px;
    }

    .cart {
        margin-top: 30px;
        background: white;
        padding: 30px;
        width: 100vh;
        border-radius: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .cart-form {
        margin-top: 20px;
    }

    form div {
        margin-bottom: 15px;
    }

    .cart-label {
        display: block;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .cart-input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .cart-button {
        border: 1px solid #dfc7b6;
        font-family: "Onest";
        background-color: white;
        color: black;
        border-radius: 5px;
        font-size: 17px;
        padding: 10px 15px;
        z-index: -1;
        transition: 300ms;
        cursor: pointer;
        right: 0;

    }

    .cart-button:hover {
        color: rgb(0, 179, 60);
    }
</style>

    <div class="main">
        <div class="cart">
            <p class="cart-title">Ваша корзина</p>

            @if (empty($cart))
                <p>Ваша корзина пуста. Добавьте книги в корзину, чтобы оформить заказ.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Название книги</th>
                            <th>Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td>{{ $item['title'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form class="cart-form" action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="cart-label" for="name">Ваше имя:</label>
                        <input class="cart-input"  type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label class="cart-label"  for="phone">Телефон:</label>
                        <input class="cart-input"  type="text" name="phone" id="phone" required>
                    </div>
                    <button class="cart-button" type="submit">Оформить заказ</button>
                </form>
            @endif
        </div>
    </div>
@endsection
