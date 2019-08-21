<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
	protected $table = 'users';
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'address',
		'birthday',
		'is_active',
	];

	protected $hidden = [
		'password',
	];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
	}
}
