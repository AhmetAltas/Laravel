@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <ul>
                            @foreach($categories as $category)
                                
                                <li class="listing"><a href="{{url('categories/'.$category['id'])}}">{{$category->name}}</a></li>
                                
                            @endforeach
                            </ul>


                        </div>

                    Categories
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
