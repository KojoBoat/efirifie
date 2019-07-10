<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['item_id', 'order_id', 'item_name', 'item_price'];
    
    public $timestamps = false;
}
