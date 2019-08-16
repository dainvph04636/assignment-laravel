<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('user.master')

@section('title', 'Quản lý sản phẩm')
@section('tieude', 'Quản lý sản phẩm')
@section('content')
<a href="{{route('products.add')}}">Thêm sản phẩm</a>
<table border='1' class='table'>
	<thead>
		<th>ID</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Sale Percent</th>
		<th>Stocks</th>
		<th>Category</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product->id}}</td>
			<td><a href="{{route('products.detail', $product->id)}}">{{$product->name}}</a></td>
			<td>{{$product->description}}</td>
			<td>{{$product->price}}</td>
			<td>{{$product->sale_percent}}</td>
			<td>{{$product->stocks}}</td>
			<td>
				@if(isset($product->category))
				{{$product->category->name}}
				@else
				<p style="font-style: italic; color: red;">(Không có danh mục)</p>
				@endif
			</td>
			<td>
				<a href="{{route('products.edit',$product->id)}}">Edit</a> &nbsp
				<a class="delete" href="{{route('products.delete', $product->id)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<script>
	$(".delete").on("click", function() {
		return confirm("Bạn có muốn xóa không ?");
	});
</script>
@endsection