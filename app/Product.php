<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'amount', 'quantity'
    ];

    protected $table = 'product';

    public function productItem() {
    	return $this->hasMany('App\ProductItem', 'product_id', 'id');
    }
}
