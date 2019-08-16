<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ValidateLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

	// function __construct()
	// {
	// 	// Đặt middleware ở trong này để lúc nào cũng đc check đầu tiên
	// 	$this -> middleware('auth');
	// }

	function index()
	{
		return view('user.master');
	}

	public function list()
	{
		$users = User::all();
		// $users = $users->load('admins');
        // dd($users->toArray());
		return view('user.list_users', ['users' => $users]);
	}

	public function logout()
	{
		Auth::logout();

		return redirect()->route('users.getLogin');
	}

	public function getLogin()
	{	
    	// if (Auth::check()) {
    	// 	return redirect()->route('user.master');
    	// }
		return view('user.login');
	}

	public function postLogin(ValidateLoginRequest $request)
	{
    	// dd(213);

    	// 1.check validate va lay du lieu gom email va pass
		$data = $request->only(['email', 'password']);
    	//2. Kiem tra 
		$checkLogin = Auth::attempt($data);
    	//3. Kiem tra neu tra ve true la dang nhap thanh cong
    	// dd(2313);
		if ($checkLogin) {
			return redirect()->route('users.master');
		}else{
			return redirect()->route('users.getLogin');
		}
	}

	public function pro()
	{
		return view('user.protected');
	}

	public function createForm ()
	{
		return view('user.add_user');
	}

	public function create (UserRequest $request)
	{
		$data = $request->except('_token');
		$data['password'] = Hash::make($data['password']);
		// dd($data);
		$multiData = [
			$data,
		];
		User::insert($multiData);
		// return view('user.list_users', ['users' => User::all()]);
    		return $this->list();
	}

	public function editForm(User $user)
	{
		return view('user.edit_user', ['user' => $user]);
	}

	public function update(UserRequest $request) {
        // 1. Lay ra du lieu can update
		$data = $request->except('_token', 'id');
        // 2. Tim ra classRoom co id truyen vao
		$user = User::find($request->id);
        // 3. Update bang phuong thuc update
		$user->update($data);
        // 4. Tra ve danh sach
		return $this->list();
	}

	public function delete(User $user) {
        // 1. class la the hien cua doi tuong ClassRoom
        // co id la class truyen vao route
        // su dung phuong thuc delete()
        $user->delete();
        // 2. Tra ve view
        return $this->list();
	}
	public function registerForm()
	{
		return view('user.register');
	}
	public function register(UserRequest $request)
	{
		$data = $request->except('_token');
		$data['password'] = Hash::make($data['password']);
		// dd($data);
		$multiData = [
			$data,
		];
		User::insert($multiData);
		// return view('user.list_users', ['users' => User::all()]);
    		return $this->getLogin();
	}

}
