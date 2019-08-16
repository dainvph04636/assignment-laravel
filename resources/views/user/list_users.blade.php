<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('user.master')

@section('title', 'Quan ly Users')
@section('tieude', 'Quản lý User')
@section('content')
<a href="{{route('users.add')}}">Thêm User</a>
<table border='1' class='table'>
	<thead>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Birth Day</th>
		<th>Email</th>
		<th>Address</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->first_name}}</td>
			<td>{{$user->last_name}}</td>
			<td>{{$user->birthday}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->address}}</td>
			<td>
				<a href="{{route('users.edit',$user->id)}}">Edit</a> &nbsp
				<a class="delete" href="{{route('users.delete', $user->id)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<script>
    $(".delete").on("click", function(){
        return confirm("Bạn có muốn xóa không ?");
    });
</script>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" >Delete</button>
			</div>
		</div>
	</div>
</div> -->
@endsection