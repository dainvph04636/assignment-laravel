<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {   
        $users = User::all();
        $products = Product::all();
        $comments = Comment::all();
        $comments = $comments->load('product');
        $comments = $comments->load('user');

        return view('product.detail_product',['products' => $products],['users' => $users]);
    }

    public function create (CommentRequest $request)
	{
		$data = $request->except('_token');
		// dd($data);
		$multiData = [
			$data,
        ];
        $comment = Comment::insert($multiData);
        return redirect()->route('products.detail', $request->product_id);
    }

    function load()
	{
        $comments = Comment::all();
        $comments = $comments->load('product');
        $comments = $comments->load('user');
        // dd($comments->toArray());
		return view('comment.list_comments',['comments' => $comments]);
    }

    public function delete(Comment $comment) {
        $comment->delete();
        return $this->load();
	}
}
