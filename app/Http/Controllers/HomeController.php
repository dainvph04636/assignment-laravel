<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(User $user)
    {
        $products = Product::all();
        $user->idc = User::find(Auth::id());
        // dd($user->idc);
        $products = $products->load('category');
        $products = $products->load('comments');

        // $category = $category -> load('products');
		return view('home_page',['products' => $products],['user' => $user]);
    }


    public function detail (Product $product, User $user)
	{   
        $categories = Category::all();
        $categories = $categories->load('products');
        $user->idc = User::find(Auth::id());
		// dd($idc);
		return view('home_detail', ['product' => $product], ['user' => $user],['categories' => $categories]);
    }
    public function create (CommentRequest $request)
	{
		$data = $request->except('_token');
		// dd($data);
		$multiData = [
			$data,
        ];
        $comment = Comment::insert($multiData);
        return redirect()->route('home.detail', $request->product_id);
    }
}
