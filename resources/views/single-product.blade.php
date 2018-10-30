@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>{{$product->name}}</h1>
    <p>{{$product->description}}</p>
    <p><strong>Price: </strong><span>{{$product->price}}</span></p>
    <p><strong>Weight: </strong><span>{{$product->weight}}</span></p>
</div>
@endsection