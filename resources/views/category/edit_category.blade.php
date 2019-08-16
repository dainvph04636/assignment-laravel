@extends('user.master')

@section('title', 'Thêm danh mục')
@section('tieude', 'Sửa danh mục')
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
<form action="{{route('categories.update')}}" method="post">
	@csrf()
    @if(isset($category))
	<input type="hidden" name="id" value="{{$category->id}}">
	@endif
	<div class="form-group">
		<label for="name">Name Category</label>
		<input class="form-control" type="text" id="name" name="name" value="{{$category->name}}">
	</div>
	<div>
		<button type="submit" class="btn btn-submit">Create</button>
	</div>
</form>
@endsection