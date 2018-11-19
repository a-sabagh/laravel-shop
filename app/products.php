<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = ['name','description','status','price','weight'];
    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\category','category_product','product_id','category_id');
    }
}
