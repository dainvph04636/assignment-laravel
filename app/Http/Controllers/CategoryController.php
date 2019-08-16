<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    function index()
	{
        $categories = Category::all();
		$categories = $categories->load('products');
        // dd($categories->toArray());
		return view('category.list_categories',['categories' => $categories]);
    }
    
    public function createForm ()
	{
		return view('category.add_category');
    }
    public function create (CategoryRequest $request)
	{
		$data = $request->except('_token');
		// dd($data);
		$multiData = [
			$data,
		];
		Category::insert($multiData);
    		return $this->index();
    }
    
    public function editForm (Category $category)
	{
		return view('category.edit_category', ['category' => $category]);
    }
    public function update(CategoryRequest $request) {
        // 1. Lay ra du lieu can update
		$data = $request->except('_token', 'id');
        // 2. Tim ra classRoom co id truyen vao
		$category = Category::find($request->id);
        // 3. Update bang phuong thuc update
		$category->update($data);
        // 4. Tra ve danh sach
		return $this->index();
    }
    
    public function delete(Category $category) {
        // 1. class la the hien cua doi tuong ClassRoom
        // co id la class truyen vao route
        // su dung phuong thuc delete()
        $category->delete();
        // 2. Tra ve view
        return $this->index();
	}
}
