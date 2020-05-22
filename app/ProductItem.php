<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sell_id', 'product_id', 'quantity', 'amount'
    ];

	protected $table = 'product_item';
    
    public function product() 
    {
    	return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
