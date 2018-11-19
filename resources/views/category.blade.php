@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                        <td>{{$category->category_name}}</td>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
