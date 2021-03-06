<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function shops()
    {
        return $this->belongsToMany('Shop');
    }

    public function product_category()
    {
        return $this->belongsToMany('productCategory');
    }

    public function reviews()
    {
        return $this->belongsTo(Review::class);
    }

    public function getStars()
    {
        return round($this ->average_rating * 2) / 2;
    }
}
