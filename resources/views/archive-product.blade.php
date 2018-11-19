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
            <b class="capitilize">created by: </b><span class="created-by">{{$product->user->name}}</span>
            @can('update', $product)
            <a type="button" class="btn btn-info edit" href="{{ route('edit.product', ['id'=>$product->id]) }}">Edit</a>
            @else
            <button type="button" disabled class="btn disabled btn-info edit" href="#">Edit</button>
            @endcan
            
        </li>
        @endforeach
    </ul>
</div>
@endsection