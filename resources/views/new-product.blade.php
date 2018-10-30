@extends('layouts.admin') 
@section('content')
<div class="container">
    <div class="page-header">
        <h1>{{__('general.add_product')}}</h1>
    </div>
    @include('errors/new-product')
    <form action="{{route('save.product')}}" method="POST">
        {{ csrf_field() }}
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        <div class="form-group">
            <input type="text" class="form-control" id="product-name" name="name" value="{{old('name')}}" aria-describedby="productName"
                placeholder="product name">
            <small id="nameHelp" class="form-text text-muted">{{__('general.name_tip')}}</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="product-description" name="description" value="{{old('description')}}" placeholder="description">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="product-price" name="price" value="{{old('price')}}" placeholder="price">
            <small id="priceHelp" class="form-text text-muted">{{__('general.price_tip')}}</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="product-weight" name="weight" value="{{old('weight')}}" placeholder="weight">
            <small id="weightHelp" class="form-text text-muted">{{__('general.weight_tip')}}</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection