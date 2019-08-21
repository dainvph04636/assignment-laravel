<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home_page');
// });


Route::group(
    ['home', 'as' => 'home.'],
    function () {
        Route::get('/', 'HomeController@index')->name('list');
        Route::get('/logged', 'HomeController@index2')->name('logged')->middleware('auth');
        Route::get('{product}/detail', 'HomeController@detail')->name('detail');
    }
);

Route::group(
    ['prefix' => 'users', 'as' => 'users.'],
    function () {
        Route::get('/', 'UserController@index')->name('master')->middleware(['auth', 'check.active']);
        // Route::get('class', 'AdminController@indexClass')->name('class');
        Route::get('login', 'UserController@getLogin')->name('getLogin');
        Route::post('post-login', 'UserController@postLogin')->name('postLogin');
        Route::get('logout', 'UserController@logout')->name('logout');
        Route::get('pro', 'UserController@pro')->name('pro')->middleware(['auth', 'check.active']);
        Route::get('list', 'UserController@list')->name('list')->middleware(['auth', 'check.active']);
        Route::get('add', 'UserController@createForm')->name('add')->middleware(['auth', 'check.active']);
        Route::post('create-post', 'UserController@create')->name('create-post')->middleware(['auth', 'check.active']);
        Route::get('{user}/edit', 'UserController@editForm')->name('edit')->middleware(['auth', 'check.active']);
        Route::post('update-post', 'UserController@update')->name('update')->middleware(['auth', 'check.active']);
        Route::get('{user}/delete', 'UserController@delete')->name('delete')->middleware(['auth', 'check.active']);
        Route::get('/register', 'UserController@registerForm')->name('register');
        Route::post('register-post', 'UserController@register')->name('register-post');
    }
);

Route::group(
    ['prefix' => 'categories', 'as' => 'categories.'],
    function () {
        Route::get('/', 'CategoryController@index')->name('list')->middleware('auth');
        Route::get('add', 'CategoryController@createForm')->name('add')->middleware('auth');
        Route::post('create-post', 'CategoryController@create')->name('create-post')->middleware('auth');
        Route::get('{category}/edit', 'CategoryController@editForm')->name('edit')->middleware('auth');
        Route::post('update-post', 'CategoryController@update')->name('update')->middleware('auth');
        Route::get('{category}/delete', 'CategoryController@delete')->name('delete')->middleware(['auth', 'check.active']);
    }
);

Route::group(
    ['prefix' => 'products', 'as' => 'products.'],
    function () {
        Route::get('/', 'ProductController@index')->name('list')->middleware('auth');
        Route::get('add', 'ProductController@createForm')->name('add')->middleware('auth');
        Route::post('create-post', 'ProductController@create')->name('create-post')->middleware('auth');
        Route::get('{product}/edit', 'ProductController@editForm')->name('edit')->middleware('auth');
        Route::post('update-post', 'ProductController@update')->name('update')->middleware('auth');
        Route::get('{product}/delete', 'ProductController@delete')->name('delete')->middleware(['auth', 'check.active']);
        Route::get('{product}/detail', 'ProductController@detail')->name('detail')->middleware('auth');
    }
);

Route::group(
    ['prefix' => 'comments', 'as' => 'comments.'],
    function () {
        Route::get('/', 'CommentController@load')->name('list')->middleware('auth');
        Route::post('create-post', 'CommentController@create')->name('create-post')->middleware('auth');
        Route::get('{comment}/delete', 'CommentController@delete')->name('delete')->middleware(['auth', 'check.active']);
    }
);
