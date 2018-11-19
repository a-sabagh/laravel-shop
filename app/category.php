<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('App\products', 'category_product', 'category_id', 'product_id');
    }
}
