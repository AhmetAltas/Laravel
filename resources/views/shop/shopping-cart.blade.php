@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="container">
                <ul class="list-group">
                    @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <strong>{{ $product['product']['name'] }}</strong>
                                <span class="label label-success">€{{ $product['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Bewerken <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('orders.reduceByOne', ['id' => $product['product']['id']])}}">Reduce by 1</a></li>
                                        <li><a href="{{route('orders.removeProduct', ['id' => $product['product']['id']])}}">Reduce All</a></li>
                                    </ul>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="container">

                <strong>Total: € {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="container">
                <form action="{{ route('checkout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">Afronden</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="container">
                <h2>No Products in Cart!</h2>
            </div>
        </div>
    @endif
@endsection