<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
	protected $fillable = [
        'name',
        'description',
        'price',
        'sale_percent',
        'stocks',
        'is_active',
        'category_id',
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'product_id', 'id');
    }
}
