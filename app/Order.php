<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'same_address',
    ];

    public function products(){
        return $this->belongsToMany('App\Product', 'order_products'); 
    }
}
