@extends('user.master')

@section('title', 'Sửa sản phẩm')
@section('tieude', 'Sửa sản phẩm')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('products.update')}}" method="post">
    @csrf()
    @if(isset($product))
    <input type="hidden" name="id" value="{{$product->id}}">
    @endif
    <div class="form-group">
        <label for="name">Name Product</label>
        <input class="form-control" type="text" id="name" name="name" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" type="text" id="description" name="description" value="{{$product->description}}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input class="form-control" type="text" id="price" name="price" value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label for="sale_percent">Sale Percent</label>
        <input class="form-control" type="text" id="sale_percent" name="sale_percent" value="{{$product->sale_percent}}">
    </div>
    <div class="form-group">
        <label for="stocks">Stocks</label>
        <input class="form-control" type="text" id="stocks" name="stocks" value="{{$product->stocks}}">
    </div>
    <div class="form-group">
        <select name="category_id" class="form-control">
            @foreach($categories as $cate)
            <option selected="{{$cate->id == $product->category_id}}" value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit" class="btn btn-submit">Create</button>
    </div>
</form>
@endsection