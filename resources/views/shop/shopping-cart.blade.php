@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="container">
                <ul class="list-group">
                    @foreach($items as $item)
                            <li class="list-group-item">
                                <span class="badge">{{ $item['qty'] }}</span>
                                <strong>{{ $item['item']['name'] }}</strong>
                                <span class="label label-success">€{{ $item['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Bewerken <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('products.reduceByOne', ['id' => $item['item']['id']])}}">Reduce by 1</a></li>
                                        <li><a href="{{route('products.removeItem', ['id' => $item['item']['id']])}}">Reduce All</a></li>
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
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection