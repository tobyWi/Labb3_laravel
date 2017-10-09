<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'name', 'description', 'category_id', 'price', 'stock', 'image_url'
    ];

}
