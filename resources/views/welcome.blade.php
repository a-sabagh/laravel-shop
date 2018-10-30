@extends('layouts.app') 
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Home Page
        </div>

        <div class="links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('product.list') }}">Products</a>
        </div>
    </div>
</div>
@endsection