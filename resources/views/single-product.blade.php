@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>{{$product->name}}</h1>
    <p>{{$product->description}}</p>
    <p><strong>Price: </strong><span>{{$product->price}}</span></p>
    <p><strong>Weight: </strong><span>{{$product->weight}}</span></p>
    <p><strong>Creator: </strong><span>{{$product->user->name}}</span></p>
    <p>
        <strong>Categories: </strong>
        @foreach ($product->categories as $category)
            {{$category->name}} <span class="seprator"> , </span>
        @endforeach
    </p>
</div>
@endsection