@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="page-header">
        <h1>Product List</h1>
    </div>
    <ul class="product-list">
        @foreach ($products as $product)
        <li id="product-item{{$product->id}}">
            <a href="product/{{$product->id}}" title="{{$product->name}}">{{$product->name}}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection