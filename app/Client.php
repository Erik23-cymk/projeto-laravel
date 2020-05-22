<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'document_number'
    ];

    protected $table = 'client';

    public function sells() {
    	return $this->hasMany('App\Sell', 'client_id', 'id');
    }
}
