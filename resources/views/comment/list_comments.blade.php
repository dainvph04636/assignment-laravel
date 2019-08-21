<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('user.master')

@section('title', 'Quản lý comments')
@section('tieude', 'Quản lý comments')
@section('content')
<table border='1' class='table'>
    <thead>
        <th>ID</th>
        <th>Comments content</th>
        <th>Product</th>
        <th>User</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->content}}</td>
            <td>{{$comment->product->name}}</td>
            <td>{{$comment->user->email}}</td>
            <td>
                <a class="delete" href="{{route('comments.delete', $comment->id)}}">Delete</a>
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