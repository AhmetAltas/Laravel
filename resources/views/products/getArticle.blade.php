@extends('layouts.app')

@section('content')
<div class="container">

	<nav class="nav">
		<a class="nav-link" href="{{ URL::to('products') }}">Back to all the products</a>
	</nav>
	<h1>{{ $product['name'] }} </h1>

	<table class="table table-bordered">		
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Product Price</th>
			</tr>
		</thead>
		<tbody>
		<tr>
			<th scope="row">{{$product['id']}}</th>
<<<<<<< HEAD
			<th>{{$product['price']}}</th>
=======
			<td>{{$product['name']}}</td>
>>>>>>> b40858d557168055ba36172ea2c46672f750dc63
		</tr>
		<h5>{{$product['description']}}</h5>
		</tbody>
	</table>
</div>
@endsection
