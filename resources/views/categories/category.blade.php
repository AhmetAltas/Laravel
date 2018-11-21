@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="container">
                <h1>Categories</h1>
                    <div class="row">
                        <table class="table table-bordered">        
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td><a href="{{route('orders.getCategory', ['id' => $category->id])}}">{{$category->name}}</a></td>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
