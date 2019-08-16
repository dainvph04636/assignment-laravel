<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('user.master')

@section('title', 'Quan ly danh muc')
@section('tieude', 'Quan ly danh muc')
@section('content')
<a href="{{route('categories.add')}}">Thêm danh muc</a>
<table border='1' class='table'>
	<thead>
		<th>ID</th>
		<th>Category</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($categories as $category)
		<tr>
			<td>{{$category->id}}</td>
			<td>{{$category->name}}</td>
			<td>
				<a href="{{route('categories.edit',$category->id)}}">Edit</a> &nbsp
				<a class="delete" href="{{route('categories.delete', $category->id)}}">Delete</a>
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
@endsection