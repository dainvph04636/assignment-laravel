<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
	protected $table = 'users';
	protected $fillable = [
		'fist_name',
		'last_name',
		'email',
		'address',
		'birthday',
		'is_active',
	];

	protected $hidden = [
		'password',
	];

	// public function classRoom()
	// {
	// 	return $this->belongsTo('App\Models\ClassRoom','class_id','id');
	// }
}
