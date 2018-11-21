@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->products as $product)
                                <li class="list-group-item">
                                    <span class="badge">${{ $product['price'] }}</span>
                                    {{ $product['product']['name'] }} | {{ $product['qty'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection