@extends('layouts.head')

@section('main')
<style>
    .orders-title {
        font-size: 23px;
        font-weight: 600;
        text-align: left;
        margin: 0;
        margin-bottom: 30px;
    }

    .orders {
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

    select {
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
        cursor: pointer;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    select:focus {
        border-color: #007bff;
        box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    option {
        padding: 10px;
    }
</style>
<div class="main">
    <div class="orders">
        <p class="orders-title">Мои заказы</p>
        <table>
            <thead>
                <tr>
                    <th>Названия книг</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            @if (!empty($order->books))
                                <ul>
                                    @foreach ($order->books as $bookTitle)
                                        <li>{{ $bookTitle }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Нет книг
                            @endif
                        </td>
                        <td>
                            @switch($order->status)
                                @case('reserved')
                                    Зарезервировано
                                    @break
                                @case('ready')
                                    Готово
                                    @break
                                @case('picked_up')
                                    Забрано
                                    @break
                                @case('canceled')
                                    Отменено
                                    @break
                                @default
                                    Неизвестный статус
                            @endswitch
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
