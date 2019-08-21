<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<link rel="stylesheet" href="{{ asset('css/csshomepage.css')}}">
<title>Home Page</title>

<a href="{{route('users.master')}}">Admin</a>
<a href="{{route('users.logout')}}">Logout</a>
<div class="container">
    <h3 class="h3">LARAVEL</h3>
    <div class="row">

        @foreach($products as $product)

        <div class="col-md-4 col-sm-6" style="margin-bottom:100px;">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="#">
                        <img class="pic-1" src="{{$product->image}}">
                        <img class="pic-2" src="{{$product->image}}">
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                        <li><a href="" class="fa fa-shopping-bag"></a></li>
                        <li><a href="" class="fa fa-shopping-cart"></a></li>
                    </ul>
                    <span class="product-discount-label">{{$product->sale_percent}}%</span>
                </div>
                <div class="product-content">
                    <div class="price">{{$product->price}} $
                        <span>{{$product->stocks}}</span>
                    </div>
                    <span class="product-shipping">
                        @if(isset($product->category))
                        {{$product->category->name}}
                        @else
                        <p style="font-style: italic; color: red;">(Không có danh mục)</p>
                        @endif
                    </span>
                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                    <a class="all-deals" href="{{route('home.detail', $product->id)}}">See Detail<i class="fa fa-angle-right icon"></i></a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
<hr>