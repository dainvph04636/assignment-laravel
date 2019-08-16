<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = $products->load('category');
        $products = $products->load('comments');

        // $category = $category -> load('products');
		return view('product.list_products',['products' => $products]);
    }

    public function createForm ()
	{   
        $categories = Category::all();
		$categories = $categories->load('products');
		return view('product.add_product',['categories' => $categories]);
    }
    public function create(ProductRequest $request)
    {
        $data = $request->except('_token');
		// dd($data);
		$multiData = [
			$data,
		];
		Product::insert($multiData);
    		return $this->index();
    }

    public function editForm (Product $product)
	{   
        $categories = Category::all();
		$categories = $categories->load('products');
		return view('product.edit_product', ['product' => $product], ['categories' => $categories]);
    }
    public function update(ProductRequest $request) {
        // 1. Lay ra du lieu can update
		$data = $request->except('_token', 'id');
        // 2. Tim ra classRoom co id truyen vao
		$product = Product::find($request->id);
        // 3. Update bang phuong thuc update
		$product->update($data);
        // 4. Tra ve danh sach
		return $this->index();
    }

    public function delete(Product $product) {
        $product->delete();
        return $this->index();
    }
    
    public function detail (Product $product)
	{   
        $categories = Category::all();
		$categories = $categories->load('products');
		return view('product.detail_product', ['product' => $product], ['categories' => $categories]);
    }
}

