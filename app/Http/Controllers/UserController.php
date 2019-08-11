<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

	public function postLogin(Request $request)
	{
    	// dd(213);
		$this->validate($request, [
			'email' => 'required|email|exists:users|min:6',
			'password' => 'required|min:6|max:32',
		]);
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
}
