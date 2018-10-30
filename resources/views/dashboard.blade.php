@extends('layouts.admin') 
@section('content')
<div class="container">
    @if (isset($new_product) && $new_product == '1')
    <div class="alert alert-success" role="alert">
        Product Successfully Added
    </div>
    @elseif(isset($new_product) && $new_product == '0')
    <div class="alert alert-danger" role="alert">
        Prodcut Adding proccess Fail
    </div>
    @endif
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Dashboard
            </div>
            <div class="links">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('new.product') }}">Create Product</a>
            </div>
        </div>
    </div>
</div>
@endsection