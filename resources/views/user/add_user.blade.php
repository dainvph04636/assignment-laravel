@extends('user.master')

@section('title', 'Them moi user')
@section('tieude', 'Thêm User')
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
<form action="{{route('users.create-post')}}" method="post">
	@csrf()
	<div class="form-group">
		<label for="first_name">First Name</label>
		<input class="form-control" type="text" id="first_name" name="first_name">
	</div>
    <div class="form-group">
		<label for="last_name">Last Name</label>
		<input class="form-control" type="text" id="last_name" name="last_name">
	</div>
    <div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="text" id="email" name="email">
	</div>
    <div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" type="password" id="password" name="password">
	</div>
    <div class="form-group">
		<label for="address">Address</label>
		<input class="form-control" type="text" id="address" name="address">
	</div>
    <div class="form-group">
		<label for="birthday">Birthday</label>
		<input class="form-control" type="date" id="birthday" name="birthday">
	</div>
    <div class="form-group">
		<label for="is_active">Active</label>
		<input type="checkbox" value="1" id="is_active" name="is_active">
	</div>
	<div>
		<button type="submit" class="btn btn-submit">Create</button>
	</div>
</form>
@endsection