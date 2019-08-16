@extends('user.master')

@section('title', 'Thêm danh mục')
@section('tieude', 'Thêm danh mục')
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

<form action="{{route('products.create-post')}}" method="post">
	@csrf()
	<div class="form-group">
		<label for="name">Name</label>
		<input class="form-control" type="text" id="name" name="name">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<input class="form-control" type="text" id="description" name="description">
	</div>
	<div class="form-group">
		<label for="price">Price</label>
		<input class="form-control" type="text" id="price" name="price">
	</div>
	<div class="form-group">
		<label for="sale_percent">Sale Percent</label>
		<input class="form-control" type="text" id="sale_percent" name="sale_percent">
	</div>
	<div class="form-group">
		<label for="stocks">Stocks</label>
		<input class="form-control" type="text" id="stocks" name="stocks">
	</div>
	<div class="form-group">
		<select name="category_id" class="form-control">
			<option selected value="">Hãy chọn một danh mục</option>
			@foreach($categories as $cate)
			<option value="{{$cate->id}}">{{$cate->name}}</option>
			@endforeach
		</select>
	</div>
	<div>
		<button type="submit" class="btn btn-submit">Create</button>
	</div>
</form>
@endsection