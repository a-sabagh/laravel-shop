@extends('layouts.admin') 
@section('content')
<div class="container">
    <div class="page-header">
        <h1>{{__('general.edit_product')}}</h1>
    </div>
    @include('errors/new-product')
    <form action="{{ route('update.product', ['id'=>$product->id]) }}" method="POST">
        {{ csrf_field() }}
        @method('put')
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        <div class="form-group">
            <input type="text" class="form-control" id="product-name" name="name" value="{{$product->name}}" aria-describedby="productName"
                placeholder="product name">
            <small id="nameHelp" class="form-text text-muted">{{__('general.name_tip')}}</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="product-description" name="description" value="{{$product->description}}" placeholder="description">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="product-price" name="price" value="{{$product->price}}" placeholder="price">
            <small id="priceHelp" class="form-text text-muted">{{__('general.price_tip')}}</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="product-weight" name="weight" value="{{$product->price}}" placeholder="weight">
            <small id="weightHelp" class="form-text text-muted">{{__('general.weight_tip')}}</small>
        </div>
        <div class="form-group">
            <select name="category_id[]" id="category-id" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option 
                    value="{{$category->id}}"
                    {{($product->categories->contains('id',$category->id))? 'selected' : ''}}
                    >
                    {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection