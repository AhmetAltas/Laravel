@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All the products</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

   <!-- <nav class="nav">
            <a class="nav-link" href="{{ URL::to('products/create') }}">Add new product</a>
    </nav> -->

    <div class="row">
        <table class="table table-bordered">        
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th colspan="2">Price</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>€{{ $product->price}}</td>
                <td><a class="btn btn-success" href="{{route('products.get', ['id' => $product->id])}}" role="button">View</a></td>
                <td><a href="{{route('products.addToCart', ['id' => $product->id])}}" role="button">Add</a></td>
                <!--<td>
                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button> -->
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
@endsection