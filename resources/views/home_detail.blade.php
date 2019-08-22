<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/csshomepage.css')}}">
<link rel="stylesheet" href="{{ asset('css/cssnavbar.css')}}">

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{$product->name}}</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/csshomedetail.css')}}">

</head>

<body>
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
	@csrf()
	@if(isset($product))
	<input type="hidden" name="id" value="{{$product->id}}">
	@endif
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">

						<div class="preview-pic tab-content">
							<div class="tab-pane active" id="pic-1"><img src="{{$product->image}}" /></div>
							<div class="tab-pane" id="pic-2"><img src="{{$product->image}}" /></div>
							<div class="tab-pane" id="pic-3"><img src="{{$product->image}}" /></div>
							<div class="tab-pane" id="pic-4"><img src="{{$product->image}}" /></div>
							<div class="tab-pane" id="pic-5"><img src="{{$product->image}}" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
							<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{$product->image}}" /></a></li>
							<li><a data-target="#pic-2" data-toggle="tab"><img src="{{$product->image}}" /></a></li>
							<li><a data-target="#pic-3" data-toggle="tab"><img src="{{$product->image}}" /></a></li>
							<li><a data-target="#pic-4" data-toggle="tab"><img src="{{$product->image}}" /></a></li>
							<li><a data-target="#pic-5" data-toggle="tab"><img src="{{$product->image}}" /></a></li>
						</ul>

					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$product->name}}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">{{$product->description}}</p>
						<h4 class="price">current price: <span>{{$product->price}}$</span></h4>
						<p class="vote"><strong style="font-size: 25pt;color: red">{{$product->sale_percent}}%</strong> SALE <strong>(87 votes)</strong></p>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="card">
			@foreach($product->comments as $comment)
			<div id="cmt-dai">
				<ul class="media-list">
					<li class="media" style="border-bottom: 1px dotted #ccc; padding: 10px;">
						<a href="#" class="pull-left">
							<img src="{{asset('img/user-icon.svg')}}" alt="" class="img-circle">
						</a>
						<div class="media-body">
							<span class="text-muted pull-right">
								<small class="text-muted">1 minute ago</small>
							</span>
							<strong class="text-success">{{$comment->user->first_name}} {{$comment->user->last_name}} - <span>({{$comment->user->email}})</span></strong>
							<p>
								{{$comment->content}}
								<p><small><a href="">Like</a> - <a href="">Share</a></small></p>
							</p>
						</div>
					</li>
				</ul>
			</div>

			@endforeach
			@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(isset($user->idc->id))
			<div id="create-comment">
				<form action="{{route('home.create-post')}}" method="post">
					@csrf()
					<input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
					<input type="hidden" id="user_id" name="user_id" value="{{$user->idc->id}}">
					<textarea id="content" name="content" class="form-control" placeholder="Nhập bình luận..." rows="3"></textarea>
					<br>
					<button type="submit" class="btn btn-info pull-right">Post</button>
					<div class="clearfix"></div>
				</form>
			</div>
			@else
			<p style="font-style: italic; color: red;"><a href="{{route('users.getLogin')}}">Đăng nhập để bình luận</a></p>
			@endif
		</div>

	</div> <!-- container tag -->
	<style>
		#create-comment {
			margin-top: 30px;
		}

		.user_name {
			font-size: 14px;
			font-weight: bold;
		}

		#cmt-dai .media {
			border-bottom: 1px dotted #ccc;
		}

		body {
			margin-top: 20px;
		}

		.comment-wrapper .panel-body {
			max-height: 650px;
			overflow: auto;

		}

		#cmt-dai .media img {
			width: 64px;
			height: 64px;
			border: 2px solid #e5e7e8;
		}

		#cmt-dai .media {
			border-bottom: 1px dashed #efefef;
			margin-bottom: 25px;
		}
		#cmt-dai .media span {
			font-style: italic;
		}
	</style>
</body>

</html>