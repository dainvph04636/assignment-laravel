<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = $products->load('category');
        $products = $products->load('comments');

        // $category = $category -> load('products');
		return view('home_page',['products' => $products]);
    }

    public function index2()
    {
        $products = Product::all();
        $products = $products->load('category');
        $products = $products->load('comments');

        // $category = $category -> load('products');
		return view('home_page_2',['products' => $products]);
    }

    public function detail (Product $product, User $user)
	{   
        $categories = Category::all();
        $categories = $categories->load('products');
        $user->idc = User::find(Auth::id());
		// dd($idc);
		return view('home_detail', ['product' => $product], ['user' => $user],['categories' => $categories]);
    }
}
