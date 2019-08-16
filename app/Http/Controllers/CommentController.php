<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {   
        $users = User::all();
        $products = Product::all();
        $coments = Comment::all();
        $coments = $coments->load('product');
        $coments = $coments->load('user');
        // $category = $category -> load('products');
        return view('product.detail_product',['products' => $products],['users' => $users]);
    }
}
