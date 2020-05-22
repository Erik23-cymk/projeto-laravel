<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'amount', 'finish_date'
    ];

    protected $dates = [
        'finish_date'
    ];

    protected $table = 'sell';

    public function client() {
    	return $this->hasOne('App\Client', 'id', 'client_id');
    }

    public function products() {
    	return $this->hasMany('App\ProductItem', 'sell_id', 'id');
    }
}
