@extends('user.master')

@section('title', 'Thông tin sản phẩm')
@section('tieude', 'Thông tin sản phẩm')
@section('content')


@csrf()
@if(isset($product))
<input type="hidden" name="id" value="{{$product->id}}">
@endif

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
    </tbody>
</table><br>

@foreach($product->comments as $comment)

<div class="comments-list">
    <div class="media">
        <p class="pull-right"><small>5 days ago</small></p>
        <a class="media-left" href="#">
            <img width="40" height="40" src="{{asset('img/user2-160x160.jpg')}}">
        </a>
        <div class="media-body">

            <h4 class="media-heading user_name">
                {{$comment->user->first_name}}
                {{$comment->user->last_name}}
                -
                ({{$comment->user->email}})
            </h4>
            {{$comment->content}}
            <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
        </div>
    </div>
</div>

@endforeach

<style>
    .user_name {
        font-size: 14px;
        font-weight: bold;
    }

    .comments-list .media {
        border-bottom: 1px dotted #ccc;
    }
</style>
@endsection