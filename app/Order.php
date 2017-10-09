<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $fillable = [
        'user_name', 'user_email', 'product_name', 'product_id'
    ];
}
