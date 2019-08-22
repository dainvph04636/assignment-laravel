<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/csshomepage.css')}}">
<link rel="stylesheet" href="{{ asset('css/cssnavbar.css')}}">

<!------ Include the above in your HEAD tag ---------->

<title>Home Page</title>

<!-- nav bar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="{{route('home.list')}}" class="navbar-brand">Home</a>
        </div>
        <ul class="nav navbar-nav navbar-right">

            @if(isset($user->idc))
            <li class="dropdown-toggle" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span> 
                    <strong>{{$user->idc->first_name}}</strong>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-login">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-center">
                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                    </p>
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-left"><strong>{{$user->idc->first_name}} {{$user->idc->last_name}}</strong></p>
                                    <p class="text-left small">{{$user->idc->email}}</p>
                                    <p class="text-left">
                                        <a href="{{route('users.master')}}" class="btn btn-primary btn-block btn-sm">Admin</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="navbar-login navbar-login-session">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>
                                        <a href="{{route('users.logout')}}" class="btn btn-danger btn-block">Logout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            @else
            <li class="dropdown-toggle" class="dropdown">
                <a href="{{route('users.getLogin')}}">Login</a>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- nav bar -->


<div class="container">
    <h3 style="margin-top: 100px;" class="h3">LARAVEL</h3>
    <div class="row">

        @foreach($products as $product)

        <div class="col-md-4 col-sm-6" style="margin-top: 50px;">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="{{route('home.detail', $product->id)}}">
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
                    <div class="price">{{$product->price}}
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